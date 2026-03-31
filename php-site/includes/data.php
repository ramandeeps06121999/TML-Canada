<?php

declare(strict_types=1);

/**
 * @return array<string, mixed>
 */
function tml_service_pages(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('servicePages.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_locations(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('locations.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_blog_articles(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('blogArticles.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_enrichments(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('enrichments.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_service_seo_content(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('serviceSeoContent.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, array<int, string>>
 */
function tml_service_related_blogs(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('serviceRelatedBlogs.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, array<int, string>>
 */
function tml_service_related_industries(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('serviceRelatedIndustries.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_industries(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('industries.json') ?? [];
    }
    return $d;
}

/**
 * @return array<string, mixed>
 */
function tml_industry_pages(): array
{
    static $d = null;
    if ($d === null) {
        $d = tml_json_load('industryPages.json') ?? [];
    }
    return $d;
}
