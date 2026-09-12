<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class GoHighLevelService
{
    private ?string $apiKey;
    private ?string $locationId;
    private string $apiUrl;
    private string $apiVersion;

    public function __construct()
    {
        $this->apiKey     = config('services.gohighlevel.api_key');
        $this->locationId = config('services.gohighlevel.location_id');
        $this->apiUrl     = rtrim(config('services.gohighlevel.api_url'), '/');
        $this->apiVersion = config('services.gohighlevel.api_version');
    }

    public function isConfigured(): bool
    {
        return filled($this->apiKey) && filled($this->locationId);
    }

    /**
     * Create or update a GHL contact and tag it with the given source.
     *
     * @param  array<string, mixed>  $data
     * @param  array<int, string>  $tags
     * @param  array<string, mixed>  $customFields
     */
    public function upsertContact(array $data, array $tags = [], array $customFields = []): ?array
    {
        if (! $this->isConfigured()) {
            Log::warning('GoHighLevel (Nextaflow) is not configured; skipping contact sync.');

            return null;
        }

        $payload = array_filter([
            'locationId'   => $this->locationId,
            'firstName'    => $data['first_name'] ?? null,
            'lastName'     => $data['last_name'] ?? null,
            'name'         => $data['name'] ?? null,
            'email'        => $data['email'] ?? null,
            'phone'        => $data['phone'] ?? null,
            'source'       => $data['source'] ?? 'website',
            'tags'         => $tags,
            'customFields' => $this->formatCustomFields($customFields),
        ], fn ($value) => $value !== null && $value !== '' && $value !== []);

        try {
            $response = Http::baseUrl($this->apiUrl)
                ->withToken($this->apiKey)
                ->withHeaders([
                    'Version'      => $this->apiVersion,
                    'Accept'       => 'application/json',
                ])
                ->post('/contacts/upsert', $payload)
                ->throw();

            return $response->json();
        } catch (RequestException $e) {
            Log::error('GoHighLevel (Nextaflow) contact upsert failed.', [
                'message'  => $e->getMessage(),
                'response' => $e->response?->json(),
            ]);

            return null;
        }
    }

    /**
     * Add a free-text note to an existing GHL contact.
     */
    public function addNote(string $contactId, string $body): void
    {
        if (! $this->isConfigured()) {
            return;
        }

        try {
            Http::baseUrl($this->apiUrl)
                ->withToken($this->apiKey)
                ->withHeaders([
                    'Version' => $this->apiVersion,
                    'Accept'  => 'application/json',
                ])
                ->post("/contacts/{$contactId}/notes", [
                    'body' => $body,
                ])
                ->throw();
        } catch (RequestException $e) {
            Log::error('GoHighLevel (Nextaflow) note creation failed.', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param  array<string, mixed>  $customFields
     * @return array<int, array<string, mixed>>
     */
    private function formatCustomFields(array $customFields): array
    {
        return collect($customFields)
            ->filter(fn ($value) => $value !== null && $value !== '')
            ->map(fn ($value, $key) => [
                'key'   => $key,
                'field_value' => $value,
            ])
            ->values()
            ->all();
    }
}
