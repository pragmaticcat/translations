# Pragmatic Translations

Craft CMS 5 plugin to manage static translations stored in the database, with a CP UI and export/import tools.

## Features
- CP section with two-level navigation: `Pragmatic > Translations`
- Manage translation keys and groups (default group: `site`)
- Per-site translation values (Craft multisite)
- Search and filter by group
- Bulk editing and delete from the grid
- Export to CSV, JSON, and PHP (ZIP with one file per locale)
- Import from CSV, JSON, and PHP (ZIP)
- Twig helper: `craft.pragmaticTranslations.t()`
- Twig filter override: `{{ 'hero.title'|t }}`
- Auto-creates missing keys on first access

## Requirements
- Craft CMS `^5.0`
- PHP `>=8.2`

## Installation
1. Add the plugin to your Craft project and run `composer install`.
2. Install the plugin from the Craft Control Panel.
3. Run migrations when prompted.

## Usage
### Twig
```twig
{{ craft.pragmaticTranslations.t('hero.title') }}
{{ craft.pragmaticTranslations.t('hero.greeting', { name: 'Oriol' }) }}
{{ 'hero.title'|t }}
{{ 'hero.title'|t('site') }}
{{ 'hero.title'|t('profesionales') }}
```

### CP
- Go to `Pragmatic > Translations` to manage keys and values.
- Use the export buttons for CSV/JSON/PHP.
- Use the import form to upload CSV/JSON/PHP ZIP files.

## Export formats
### CSV
Header:
```
key,group,<language1>,<language2>,...
```

### JSON
```json
{
  "hero.title": {
    "group": "home",
    "translations": {
      "en-US": "Welcome",
      "es-ES": "Bienvenido"
    }
  }
}
```

### PHP (ZIP)
The export produces a ZIP with files in:
```
translations/<locale>.php
```
Each file returns a key/value array compatible with Craft i18n conventions.

## Fallback behavior
- If a translation is missing for the current site, the plugin returns the primary site value.
- If the primary site also has no value, it returns the key.

## Permissions
- `pragmatic-translations:manage`
- `pragmatic-translations:export`
