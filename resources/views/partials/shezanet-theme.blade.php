{{-- ShezaNet Design System – shared CSS variables and component classes --}}
<style>
    /* ── Base ─────────────────────────────────────────────── */
    :root {
        --sn-bg:           #060916;
        --sn-surface:      #0c1220;
        --sn-green:        #36f21b;
        --sn-green-dark:   #14b80f;
        --sn-green-10:     rgba(54,242,27,0.10);
        --sn-green-12:     rgba(54,242,27,0.12);
        --sn-green-18:     rgba(54,242,27,0.18);
        --sn-green-20:     rgba(54,242,27,0.20);
        --sn-ink:          #050b14;
    }

    /* ── Layout ──────────────────────────────────────────── */
    .sn-sidebar  { background: var(--sn-bg);      border-right:  1px solid var(--sn-green-12); }
    .sn-topbar   { background: var(--sn-bg);      border-bottom: 1px solid var(--sn-green-12); }
    .sn-surface  { background: var(--sn-surface); border: 1px solid var(--sn-green-10); }

    /* ── Navigation ──────────────────────────────────────── */
    .sn-nav-link         { color: #9ca3af; transition: background .15s, color .15s; }
    .sn-nav-link:hover   { background: rgba(54,242,27,0.07); color: #86efac; }
    .sn-nav-active       { background: var(--sn-green-12) !important; color: #4ade80 !important; }

    /* ── Card ────────────────────────────────────────────── */
    .sn-card {
        background: rgba(6,9,22,0.92);
        border: 1px solid var(--sn-green-18);
        box-shadow: 0 0 40px rgba(54,242,27,0.07), 0 20px 40px rgba(0,0,0,0.5);
    }

    /* ── Form inputs ─────────────────────────────────────── */
    .sn-input {
        background: rgba(255,255,255,0.04);
        border: 1px solid var(--sn-green-20);
        color: #fff;
        transition: border-color .2s, box-shadow .2s;
    }
    .sn-input::placeholder { color: #4a5568; }
    .sn-input:focus {
        outline: none;
        border-color: var(--sn-green);
        box-shadow: 0 0 0 3px rgba(54,242,27,0.12);
    }

    /* ── Buttons ─────────────────────────────────────────── */
    .sn-btn {
        background: linear-gradient(135deg, var(--sn-green) 0%, var(--sn-green-dark) 100%);
        color: var(--sn-ink);
        font-weight: 700;
        transition: filter .2s, transform .15s;
    }
    .sn-btn:hover  { filter: brightness(1.1); transform: translateY(-1px); }
    .sn-btn:active { transform: translateY(0); }

    /* ── Avatar ──────────────────────────────────────────── */
    .sn-avatar {
        background: linear-gradient(135deg, var(--sn-green), var(--sn-green-dark));
        color: var(--sn-ink);
    }

    /* ── Flash alerts ────────────────────────────────────── */
    .sn-alert-success { background: rgba(54,242,27,0.08); border: 1px solid rgba(54,242,27,0.25); color: #86efac; }
    .sn-alert-error   { background: rgba(239,68,68,0.08);  border: 1px solid rgba(239,68,68,0.25);  color: #fca5a5; }

    /* ── Stat widget ─────────────────────────────────────── */
    .sn-stat { background: rgba(54,242,27,0.07); border: 1px solid var(--sn-green-18); }
</style>
