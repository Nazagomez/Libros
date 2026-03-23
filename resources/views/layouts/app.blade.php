<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Books') — Tarea 1</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f4f1ec;
            --bg-warm: #ebe6dc;
            --surface: #fffcf7;
            --surface-2: #f8f5f0;
            --text: #1a1714;
            --text-soft: #5c564d;
            --muted: #8a8278;
            --accent: #2c5f4e;
            --accent-hover: #234a3d;
            --accent-soft: rgba(44, 95, 78, 0.12);
            --gold: #b8860b;
            --border: rgba(26, 23, 20, 0.08);
            --border-strong: rgba(26, 23, 20, 0.12);
            --shadow: 0 1px 2px rgba(26, 23, 20, 0.04), 0 4px 24px rgba(26, 23, 20, 0.06);
            --shadow-lg: 0 4px 8px rgba(26, 23, 20, 0.04), 0 24px 48px rgba(26, 23, 20, 0.08);
            --radius: 14px;
            --radius-sm: 10px;
            --font: "DM Sans", system-ui, sans-serif;
            --font-display: "Fraunces", Georgia, serif;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: var(--font);
            font-size: 1rem;
            line-height: 1.55;
            color: var(--text);
            background: var(--bg);
            min-height: 100vh;
        }
        .bg-pattern {
            position: fixed;
            inset: 0;
            z-index: -1;
            background:
                radial-gradient(ellipse 100% 80% at 50% -30%, rgba(44, 95, 78, 0.09), transparent 55%),
                radial-gradient(ellipse 60% 50% at 100% 0%, rgba(184, 134, 11, 0.06), transparent 45%),
                var(--bg);
        }
        a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.15s ease;
        }
        a:hover { color: var(--accent-hover); }
        a:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 3px;
            border-radius: 4px;
        }
        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 252, 247, 0.82);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-strong);
        }
        .site-header__inner {
            max-width: 1040px;
            margin: 0 auto;
            padding: 0.9rem 1.5rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            color: var(--text);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            letter-spacing: -0.02em;
        }
        .brand:hover { color: var(--accent); }
        .brand__mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(145deg, var(--accent) 0%, #1e4638 100%);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(44, 95, 78, 0.35);
        }
        .nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.35rem;
        }
        .nav a {
            padding: 0.45rem 0.85rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-soft);
        }
        .nav a:hover {
            background: var(--accent-soft);
            color: var(--accent);
        }
        .nav a.is-active {
            background: var(--accent);
            color: #fff;
        }
        .nav a.is-active:hover { color: #fff; background: var(--accent-hover); }
        .site-main {
            max-width: 1040px;
            margin: 0 auto;
            padding: 2rem 1.5rem 4rem;
        }
        .page-hero {
            margin-bottom: 2rem;
        }
        .page-hero__eyebrow {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            margin: 0 0 0.5rem;
        }
        .page-hero h1 {
            font-family: var(--font-display);
            font-size: clamp(1.75rem, 4vw, 2.25rem);
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin: 0 0 0.5rem;
            color: var(--text);
        }
        .page-hero p {
            margin: 0;
            max-width: 42ch;
            color: var(--text-soft);
            font-size: 1.02rem;
        }
        .card {
            background: var(--surface);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        .table-wrap { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }
        th, td {
            text-align: left;
            padding: 0.85rem 1.25rem;
            border-bottom: 1px solid var(--border);
        }
        th {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            background: var(--surface-2);
        }
        tbody tr {
            transition: background 0.12s ease;
        }
        tbody tr:hover {
            background: rgba(44, 95, 78, 0.04);
        }
        tbody tr:last-child td { border-bottom: none; }
        td a { font-weight: 600; }
        .detail-card {
            padding: 1.75rem 1.5rem 1.5rem;
        }
        .detail-card__title {
            font-family: var(--font-display);
            font-size: 1.65rem;
            font-weight: 600;
            margin: 0 0 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
            letter-spacing: -0.02em;
        }
        dl.detail-list {
            display: grid;
            grid-template-columns: minmax(100px, 140px) 1fr;
            gap: 0.75rem 1.25rem;
            margin: 0;
        }
        dl.detail-list dt {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
        }
        dl.detail-list dd {
            margin: 0;
            color: var(--text);
        }
        .chip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.35rem;
        }
        .chip {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.65rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
            background: var(--surface-2);
            color: var(--text-soft);
            border: 1px solid var(--border);
        }
        .chip--accent {
            background: var(--accent-soft);
            color: var(--accent);
            border-color: transparent;
        }
        ul.link-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        ul.link-list li {
            border-bottom: 1px solid var(--border);
        }
        ul.link-list li:last-child { border-bottom: none; }
        ul.link-list a {
            display: block;
            padding: 0.65rem 0;
            font-weight: 600;
        }
        ul.link-list a:hover { padding-left: 0.25rem; }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            margin-top: 1.75rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-soft);
        }
        .back-link:hover { color: var(--accent); }
        .back-link::before {
            content: "←";
            font-size: 1rem;
            opacity: 0.8;
        }
        .site-footer {
            max-width: 1040px;
            margin: 0 auto;
            padding: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--muted);
            border-top: 1px solid var(--border);
        }
        .diagram-box {
            background: #1e2428;
            color: #d4cfc7;
            border-radius: var(--radius);
            padding: 1.5rem;
            overflow-x: auto;
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: var(--shadow-lg);
        }
        .diagram-box pre {
            margin: 0;
            font-family: ui-monospace, "Cascadia Code", "SF Mono", Menlo, monospace;
            font-size: 0.78rem;
            line-height: 1.45;
        }
        @media (max-width: 560px) {
            dl.detail-list {
                grid-template-columns: 1fr;
            }
            dl.detail-list dt { margin-top: 0.5rem; }
            dl.detail-list dt:first-child { margin-top: 0; }
        }
    </style>
</head>
<body>
    <div class="bg-pattern" aria-hidden="true"></div>
    <header class="site-header">
        <div class="site-header__inner">
            <a class="brand" href="{{ url('/') }}">
                <span class="brand__mark" aria-hidden="true">📚</span>
                <span>Library Catalog</span>
            </a>
            <nav class="nav" aria-label="Main">
                <a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.*') ? 'is-active' : '' }}">Books</a>
                <a href="{{ route('authors.index') }}" class="{{ request()->routeIs('authors.*') ? 'is-active' : '' }}">Authors</a>
                <a href="{{ route('publishers.index') }}" class="{{ request()->routeIs('publishers.*') ? 'is-active' : '' }}">Publishers</a>
                <a href="{{ route('diagram') }}" class="{{ request()->routeIs('diagram') ? 'is-active' : '' }}">Diagram</a>
            </nav>
        </div>
    </header>
    <main class="site-main">
        @yield('content')
    </main>
    <footer class="site-footer">
        Tarea 1 — Books, authors &amp; publishers
    </footer>
</body>
</html>
