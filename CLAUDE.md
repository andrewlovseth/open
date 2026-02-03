# CLAUDE.md - OpenDrives WordPress Theme

This file provides guidance for Claude Code when working with the OpenDrives theme.

## Build Commands

```bash
npm run dev    # Development mode with BrowserSync (proxies https://open.local)
npm run build  # Production build (minified CSS/JS)
npm run clean  # Remove build artifacts
```

**Note**: BrowserSync expects `https://open.local` - ensure DDEV is configured with this hostname or update `gulpfile.js`.

## Architecture Overview

- **Theme Type**: Classic PHP theme with block support
- **Build Tools**: Gulp 5 + esbuild + dart-sass + PostCSS
- **CSS Strategy**: Per-template CSS files for optimal loading
- **JS Strategy**: Single bundle with lazy-loaded Swiper from CDN

## Directory Structure

```
├── functions/           # Modular PHP includes
│   ├── enqueue-styles-scripts.php  # Smart CSS/JS loading
│   ├── acf.php                     # ACF configuration
│   ├── theme-support.php           # WordPress features
│   └── ...
├── templates/           # Custom page templates (68 files)
├── template-parts/      # Reusable components
│   ├── header/          # Header variations
│   ├── footer/          # Footer variations
│   └── global/          # Shared partials
├── src/
│   ├── scss/
│   │   ├── global.scss            # Main stylesheet
│   │   ├── abstracts/             # Tokens, mixins, variables
│   │   ├── base/                  # Reset, typography
│   │   ├── components/            # Reusable UI
│   │   ├── layout/                # Structure
│   │   └── templates/             # Per-template styles
│   │       └── <template-name>/   # Each template has _index.scss
│   └── js/
│       └── main.js                # Entry point
└── public/              # Build output (gitignored)
    ├── css/
    │   ├── global.css
    │   └── templates/   # Per-template CSS files
    └── main.js
```

## CSS Architecture

### Layered Cascade
Uses CSS `@layer` for explicit cascade control:
```scss
@layer base, layout, components, utilities;
```

### Design Tokens (abstracts/)
| File | Purpose |
|------|---------|
| `_colors.scss` | Brand colors, semantic colors |
| `_type-sizes.scss` | Typography scale |
| `_media-queries.scss` | Breakpoint mixins |
| `_section-spacing.scss` | Vertical rhythm |

### Per-Template CSS
Each template can have dedicated styles:
1. Create `src/scss/templates/<template-name>/_index.scss`
2. Build outputs to `public/css/templates/<template-name>.css`
3. PHP auto-enqueues based on template slug

The CSS loading system in `functions/enqueue-styles-scripts.php` intelligently matches:
- Page templates: `templates/template-home.php` → `templates/template-home.css`
- Archives: `archive-{post_type}.css`
- Singles: `single-{post_type}.css`

## JavaScript

Single entry point at `src/js/main.js`:
- Bundled with esbuild
- Swiper lazy-loaded from CDN when carousels are present
- Module pattern for component initialization

## ACF (Advanced Custom Fields)

Heavy ACF usage with 67 field groups. Key patterns:

### Options Pages
Multiple ACF options pages for site-wide settings. Access via:
```php
get_field('field_name', 'option');
```

### Flexible Content
Many templates use ACF flexible content for modular page building.

### Repeaters
Common pattern for lists, testimonials, features, etc.

## Common Tasks

### Add a New Page Template
1. Create `templates/template-{name}.php` with template header
2. Create `src/scss/templates/template-{name}/_index.scss`
3. Run `npm run build` to compile CSS
4. CSS auto-loads when template is assigned

### Add Template-Specific Styles
1. Navigate to `src/scss/templates/<template-name>/`
2. Edit `_index.scss` (import partials as needed)
3. Changes reflect via BrowserSync in dev mode

### Modify Global Styles
Edit files in `src/scss/` directories:
- `base/` for resets and defaults
- `components/` for reusable UI elements
- `layout/` for structural patterns
- `abstracts/` for variables and mixins

## Development Environment

Uses DDEV (see parent repo's CLAUDE.md):
```bash
ddev start              # Start environment
ddev wp <command>       # WP-CLI access
```

Local URL: `https://opendrives.dev` (or `https://open.local` for BrowserSync)

## Coding Conventions

### PHP
- WordPress coding standards
- Heavy use of `get_template_part()` for modularity
- ACF field access via `get_field()` / `the_field()`

### SCSS
- BEM-ish naming for components
- Use abstracts for all colors, spacing, typography
- Keep template styles isolated to their directories

### JavaScript
- Vanilla JS preferred
- Module pattern for organization
- CDN for heavy libraries (Swiper)
