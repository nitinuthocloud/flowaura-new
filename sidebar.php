<!-- Sidebar -->
<style>
    /* Sidebar */
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 240px;
        height: 100vh;
        background: #1a1d29;
        color: white;
        overflow-y: auto;
        z-index: 1000;
    }

    .sidebar-brand {
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .brand-logo {
        width: 32px;
        height: 32px;
        background: #3b82f6;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
    }

    .brand-text h2 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .brand-text p {
        font-size: 11px;
        color: #9ca3af;
        margin: 0;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: #9ca3af;
        text-decoration: none;
        transition: all 0.2s;
        font-size: 14px;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: white;
    }

    .nav-link.active {
        background: rgba(59, 130, 246, 0.15);
        color: #3b82f6;
        border-left: 3px solid #3b82f6;
    }

    .nav-icon {
        margin-right: 12px;
        font-size: 18px;
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">U</div>
        <div class="brand-text">
            <h2>Utho CRM</h2>
            <p>Manage accounts</p>
        </div>
    </div>
    <nav>
        <a href="/sales/sales-dashboard.php" class="nav-link">
            <span class="nav-icon">📊</span>
            <span>Sales Dashboard</span>
        </a>
        <a href="/account_management/account-management-dashboard.php" class="nav-link">
            <span class="nav-icon">🏢</span>
            <span>Account Management</span>
        </a>
        <a href="/leads/leads-dashboard.php" class="nav-link">
            <span class="nav-icon">🎯</span>
            <span>Leads</span>
        </a>
        <a href="/support/support-dashboard.php" class="nav-link">
            <span class="nav-icon">🎧</span>
            <span>Support</span>
        </a>
        <a href="/billing/billing-dashboard.php" class="nav-link">
            <span class="nav-icon">💰</span>
            <span>Billing & Finance</span>
        </a>

    </nav>
</div>

<script>
    const currentPath = window.location.pathname;

    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
</script>