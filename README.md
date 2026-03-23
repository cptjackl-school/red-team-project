# Retro Restoration WordPress Project

This repository tracks only custom WordPress code (theme/plugin) for use with LocalWP.

## Structure

- `theme/` custom WordPress theme

## LocalWP Setup

1. Create your WordPress site in LocalWP.
2. Open LocalWP site files and locate:
    - `app/public/wp-content/themes`
    - `app/public/wp-content/plugins`
3. Symlink this repo folders into LocalWP.

### Windows (PowerShell)

Update paths as needed:

```powershell
New-Item -ItemType SymbolicLink -Path "C:\Users\JackL\Local Sites\retrorestoration\app\public\wp-content\themes\retro-restoration" -Target "C:\Users\JackL\Projects\RetroRestoration\theme"
```

### macOS/Linux

```bash
ln -s /path/to/RetroRestoration/theme /path/to/localwp/site/app/public/wp-content/themes/retro-restoration
ln -s /path/to/RetroRestoration/plugin /path/to/localwp/site/app/public/wp-content/plugins/retro-restoration-tools
```

## Activate in WordPress

- Activate **Retro Restoration** theme in **Appearance → Themes**.
- Activate **Retro Restoration Tools** plugin in **Plugins**.
