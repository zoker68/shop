<?php

namespace Zoker\Shop\Enums;

enum MinimaxEndPoints: string
{
    case AUTH = '/aut/oauth20/token';

    case PRODUCTS = '/api/orgs/{organisationId}/items';

    case ALL_ORGANISATIONS = '/api/currentuser/orgs';

    case STOCK = '/api/orgs/{organisationId}/stocks';

    public function withOrganisationId(): string
    {
        return $this->with(['organisationId' => config('services.minimax.organization_id')]);
    }

    public function with(array $params): string
    {
        $endpoint = $this->value;
        foreach ($params as $key => $value) {
            $endpoint = str_replace('{' . $key . '}', $value, $endpoint);
        }

        return $endpoint;
    }
}
