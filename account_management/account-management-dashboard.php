<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management Dashboard - Utho CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="account_style.css">
    <style>
        /* Enhanced Table Styles */
        .followup-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .followup-table thead th {
            background: #f8fafc;
            padding: 12px 10px;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            text-align: left;
            white-space: nowrap;
        }

        .followup-table tbody td {
            padding: 12px 10px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }

        .followup-table tbody tr:hover {
            background: #f9fafb;
        }

        .account-link {
            color: #2563eb;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
        }

        .account-link:hover {
            text-decoration: underline;
        }

        .status-select {
            padding: 4px 8px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 12px;
            background: white;
            min-width: 120px;
        }

        .status-amount {
            font-size: 11px;
            color: #059669;
            margin-top: 4px;
            font-weight: 600;
        }

        /* Search Filters */
        .search-filters {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            flex-wrap: wrap;
            align-items: end;
        }

        .search-filters .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .search-filters label {
            font-size: 11px;
            font-weight: 600;
            color: #6b7280;
        }

        .search-filters input,
        .search-filters select {
            padding: 6px 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 13px;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
        }

        .pagination-btn {
            padding: 6px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            font-size: 13px;
        }

        .pagination-btn:hover,
        .pagination-btn.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination-input {
            width: 50px;
            padding: 6px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            text-align: center;
        }

        /* Account Details Modal */
        .modal-header-custom {
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .account-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .account-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .account-name-title {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
        }

        .account-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .account-stat-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px;
            text-align: center;
        }

        .account-stat-label {
            font-size: 11px;
            color: #2563eb;
            margin-bottom: 4px;
        }

        .account-stat-value {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .account-info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .account-info-item label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
        }

        .account-info-item span {
            font-size: 13px;
            color: #6b7280;
        }

        .tab-nav {
            display: flex;
            gap: 8px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 16px;
        }

        .tab-nav button {
            padding: 8px 16px;
            border: none;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .tab-nav button.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .activity-entry {
            display: flex;
            gap: 12px;
            padding: 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .activity-icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dcfce7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #15803d;
        }

        .activity-entry-content {
            flex: 1;
        }

        .activity-entry-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }

        .note-input-row {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }

        .note-input-row input {
            flex: 1;
            padding: 6px 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        /* Referral Form Modal */
        .form-label-custom {
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
        }
    </style>
</head>

<body>
    <?php include "../sidebar.php" ?>

    <!-- Top Header -->
    <div class="top-header">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Search leads, contacts, accounts, deals...">
        </div>
        <div class="header-actions">
            <button class="btn-add">+ Add</button>
            <div class="notification-bell">
                🔔
                <span class="notification-badge">3</span>
            </div>
            <div class="user-menu">
                <div class="user-avatar">LK</div>
                <div>
                    <div style="font-size: 13px; font-weight: 600; color: #1f2937;">Lalit Kumar</div>
                    <div style="font-size: 11px; color: #9ca3af;">Account Manager</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Account Management Dashboard</h1>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-group">
                <span class="filter-label">📋</span>
                <select class="filter-select">
                    <option>All users</option>
                    <option>My accounts</option>
                    <option>Team accounts</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="filter-btn active">Today</button>
                <button class="filter-btn">This Week</button>
                <button class="filter-btn">This Month</button>
                <button class="filter-btn">This Quarter</button>
                <button class="filter-btn">Custom</button>
            </div>
            <div class="filter-group">
                <span class="filter-label">🔽</span>
                <select class="filter-select">
                    <option>All sources</option>
                </select>
            </div>
            <div class="filter-group">
                <select class="filter-select">
                    <option>My leads</option>
                </select>
            </div>
            <div style="flex: 1;"></div>
            <button class="filter-btn btn-reset">Reset</button>
            <button class="filter-btn btn-apply">Apply Filters</button>
        </div>

        <!-- KPI Cards -->
        <div class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">Total MRR</div>
                    <div class="kpi-icon green">💰</div>
                </div>
                <div class="kpi-value">₹42.8L</div>
                <div class="kpi-subtitle">Monthly Recurring Revenue</div>
                <div class="kpi-trend up">↑ 8.5% vs last month</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">Net Revenue Change</div>
                    <div class="kpi-icon blue">📈</div>
                </div>
                <div class="kpi-value">₹3.2L</div>
                <div class="kpi-subtitle">Expansion - Contraction - Churn</div>
                <div class="kpi-trend up">↑ Last 30 days</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">Churn Rate</div>
                    <div class="kpi-icon orange">⚠️</div>
                </div>
                <div class="kpi-value">2.4%</div>
                <div class="kpi-subtitle">Last 90 days</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">At-Risk Accounts</div>
                    <div class="kpi-icon red">🚨</div>
                </div>
                <div class="kpi-value">12</div>
                <div class="kpi-subtitle">Based on health score</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">Active Advocates</div>
                    <div class="kpi-icon blue">👥</div>
                </div>
                <div class="kpi-value">34</div>
                <div class="kpi-subtitle">Referral & testimonial ready</div>
                <div class="kpi-trend up">↑ 5 new this month</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div class="kpi-label">Avg Health Score</div>
                    <div class="kpi-icon green">❤️</div>
                </div>
                <div class="kpi-value">78/100</div>
                <div class="kpi-subtitle">Weighted average</div>
            </div>
        </div>

        <!-- Account Health & Churn Risk -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-title-icon">🎯</span>
                    Account Health & Churn Risk
                </h3>
                <select class="filter-select">
                    <option>All At-Risk</option>
                    <option>Critical Only</option>
                </select>
            </div>
            <div class="health-grid">
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 16px; color: #6b7280;">Health Score
                        Distribution</h5>
                    <canvas id="healthChart" style="max-height: 200px;"></canvas>
                    <div class="health-legend">
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #15803d;"></div>
                                <span class="legend-label">Healthy</span>
                            </div>
                            <span class="legend-value">85</span>
                        </div>
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #eab308;"></div>
                                <span class="legend-label">Watchlist</span>
                            </div>
                            <span class="legend-value">34</span>
                        </div>
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #f97316;"></div>
                                <span class="legend-label">At Risk</span>
                            </div>
                            <span class="legend-value">19</span>
                        </div>
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #dc2626;"></div>
                                <span class="legend-label">Critical</span>
                            </div>
                            <span class="legend-value">9</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 16px; color: #6b7280;">High Priority
                        At-Risk Accounts</h5>
                    <div class="risk-cards">
                        <div class="risk-card">
                            <div class="risk-header">
                                <div>
                                    <div class="risk-company">TechStart Solutions</div>
                                    <div class="risk-details">MRR: ₹3.2L | Health: 32% | ARR: ₹38.4L</div>
                                </div>
                                <div class="risk-badge critical">Score: 32</div>
                            </div>
                            <div class="risk-tags">
                                <span class="risk-tag">Low usage</span>
                                <span class="risk-tag">High tickets</span>
                            </div>
                            <div class="risk-footer">
                                <span>Last contact: 15 days ago | Renewal: Jan 15, 2025</span>
                                <div class="risk-actions">
                                    <button class="action-btn">📞</button>
                                    <button class="action-btn">✉️</button>
                                    <button class="action-btn">📝</button>
                                    <button class="action-btn">→</button>
                                </div>
                            </div>
                        </div>
                        <div class="risk-card">
                            <div class="risk-header">
                                <div>
                                    <div class="risk-company">Digital Innovation Pvt Ltd</div>
                                    <div class="risk-details">MRR: ₹1.2L | Health: 45% | ARR: ₹14.4L</div>
                                </div>
                                <div class="risk-badge critical">CRITICAL</div>
                            </div>
                            <div class="risk-tags">
                                <span class="risk-tag">Payment delays</span>
                                <span class="risk-tag">No engagement</span>
                            </div>
                            <div class="risk-footer">
                                <span>Payment delayed: No engagement</span>
                                <div class="risk-actions">
                                    <button class="action-btn">📞</button>
                                    <button class="action-btn">✉️</button>
                                    <button class="action-btn">📝</button>
                                    <button class="action-btn">→</button>
                                </div>
                            </div>
                        </div>
                        <div class="risk-card">
                            <div class="risk-header">
                                <div>
                                    <div class="risk-company">CloudFirst Systems</div>
                                    <div class="risk-details">MRR: ₹8L | Health: 51% | ARR: ₹96L</div>
                                </div>
                                <div class="risk-badge critical">Score: 51</div>
                            </div>
                            <div class="risk-tags">
                                <span class="risk-tag">Critical tickets</span>
                                <span class="risk-tag">Low adoption</span>
                            </div>
                            <div class="risk-footer">
                                <span>Last contact: 7 days ago | Renewal: Feb 10, 2025</span>
                                <div class="risk-actions">
                                    <button class="action-btn">📞</button>
                                    <button class="action-btn">✉️</button>
                                    <button class="action-btn">📝</button>
                                    <button class="action-btn">→</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Renewals & MRR Trend -->
        <div class="two-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">
                        <span class="section-title-icon">📅</span>
                        Upcoming Renewals
                    </h3>
                    <select class="filter-select">
                        <option>Next 90 days</option>
                        <option>Next 30 days</option>
                        <option>This quarter</option>
                    </select>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Account</th>
                            <th>MRR</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="renewalsTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
                <div style="text-align: center; margin-top: 16px;">
                    <button class="btn-secondary"
                        style="border: 1px solid #e5e7eb; padding: 8px 16px; border-radius: 6px; background: white; cursor: pointer;">View
                        All Renewals</button>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">
                        <span class="section-title-icon">📊</span>
                        MRR Trend & Growth
                    </h3>
                    <select class="filter-select">
                        <option>Last 6 months</option>
                        <option>Last 3 months</option>
                        <option>Last 12 months</option>
                    </select>
                </div>
                <div style="display: flex; gap: 16px; margin-bottom: 16px;">
                    <div style="flex: 1; background: #dcfce7; padding: 12px; border-radius: 8px;">
                        <div style="font-size: 11px; color: #15803d; font-weight: 600;">Existing MRR</div>
                        <div style="font-size: 20px; font-weight: 700; color: #15803d;">₹1.4L</div>
                    </div>
                    <div style="flex: 1; background: #fed7aa; padding: 12px; border-radius: 8px;">
                        <div style="font-size: 11px; color: #c2410c; font-weight: 600;">Collection MRR</div>
                        <div style="font-size: 20px; font-weight: 700; color: #c2410c;">₹1.6L</div>
                    </div>
                    <div style="flex: 1; background: #fce7f3; padding: 12px; border-radius: 8px;">
                        <div style="font-size: 11px; color: #be185d; font-weight: 600;">Churn MRR</div>
                        <div style="font-size: 20px; font-weight: 700; color: #be185d;">₹1.6L</div>
                    </div>
                    <div style="flex: 1; background: #dbeafe; padding: 12px; border-radius: 8px;">
                        <div style="font-size: 11px; color: #1e40af; font-weight: 600;">Net MRR Growth</div>
                        <div style="font-size: 20px; font-weight: 700; color: #1e40af;">+13.2%</div>
                    </div>
                </div>
                <canvas id="mrrChart" style="max-height: 200px;"></canvas>
            </div>
        </div>

        <!-- Followup KPI Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="kpi-card">
                    <div class="kpi-header">
                        <div class="kpi-label">Overdue Followups</div>
                        <div class="kpi-icon red">⏰</div>
                    </div>
                    <div class="kpi-value" id="kpi-overdue">8</div>
                    <div class="kpi-subtitle">Needs immediate attention</div>
                    <div class="kpi-trend down">↓ Past deadline</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="kpi-card">
                    <div class="kpi-header">
                        <div class="kpi-label">Today Due Followups</div>
                        <div class="kpi-icon orange">📋</div>
                    </div>
                    <div class="kpi-value" id="kpi-today">5</div>
                    <div class="kpi-subtitle">Due today</div>
                    <div class="kpi-trend up">Complete before EOD</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="kpi-card">
                    <div class="kpi-header">
                        <div class="kpi-label">This Week Due Followups</div>
                        <div class="kpi-icon blue">📅</div>
                    </div>
                    <div class="kpi-value" id="kpi-week">12</div>
                    <div class="kpi-subtitle">Due this week</div>
                    <div class="kpi-trend up">Plan ahead</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="kpi-card">
                    <div class="kpi-header">
                        <div class="kpi-label">Next 30 Days Due</div>
                        <div class="kpi-icon green">📆</div>
                    </div>
                    <div class="kpi-value" id="kpi-month">28</div>
                    <div class="kpi-subtitle">Upcoming in 30 days</div>
                    <div class="kpi-trend up">Schedule proactively</div>
                </div>
            </div>
        </div>

        <!-- My Follow-ups & QBRs -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-title-icon">✓</span>
                    My Follow-ups & QBRs
                </h3>
                <div style="display: flex; gap: 8px;">
                    <button class="filter-btn active" data-filter="today">Today</button>
                    <button class="filter-btn" data-filter="overdue">Overdue</button>
                    <button class="filter-btn" data-filter="week">Next 7 Days</button>
                    <button class="filter-btn" data-filter="month">Next 30 Days</button>
                </div>
            </div>

            <!-- Search Filters -->
            <div class="search-filters">
                <div class="form-group">
                    <label>Department</label>
                    <select id="filterDepartment" class="form-control">
                        <option value="">All Departments</option>
                        <option value="Sales">Sales</option>
                        <option value="Support">Support</option>
                        <option value="Billing">Billing</option>
                        <option value="Technical">Technical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date From</label>
                    <input type="date" id="filterDateFrom" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date To</label>
                    <input type="date" id="filterDateTo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ref Type</label>
                    <select id="filterRefType" class="form-control">
                        <option value="">All Types</option>
                        <option value="Renewal QBR">Renewal QBR</option>
                        <option value="Ticket Review">Ticket Review</option>
                        <option value="Payment Followup">Payment Followup</option>
                        <option value="Health Check">Health Check</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ref ID</label>
                    <input type="text" id="filterRefId" placeholder="Search Ref ID..." class="form-control">
                </div>
                <button class="btn btn-primary btn-sm" onclick="applyFollowupFilters()">Search</button>
                <button class="btn btn-outline-secondary btn-sm" onclick="clearFollowupFilters()">Clear</button>
            </div>

            <div class="table-responsive">
                <table class="followup-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Followup Time</th>
                            <th>Account Name</th>
                            <th>Last Message</th>
                            <th>Assigned To</th>
                            <th>Department</th>
                            <th>User Id</th>
                            <th>Account Status</th>
                            <th>Entry Time</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody id="followupsTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-container" id="followupsPagination">
                <!-- Populated by JS -->
            </div>
        </div>

        <!-- Referrals & Customer Advocacy -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-title-icon">🤝</span>
                    Referrals & Company Advocacy
                </h3>
                <button class="btn btn-primary btn-sm" onclick="openAddReferralModal()">+ Add Referral</button>
            </div>
            <div class="referral-stats">
                <div class="ref-stat">
                    <div class="ref-stat-value">28</div>
                    <div class="ref-stat-label">Referrals</div>
                </div>
                <div class="ref-stat">
                    <div class="ref-stat-value">12</div>
                    <div class="ref-stat-label">Testimonials</div>
                </div>
                <div class="ref-stat">
                    <div class="ref-stat-value">₹8.4L</div>
                    <div class="ref-stat-label">Potential MRR</div>
                </div>
            </div>
            <div class="advocacy-grid">
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 12px; color: #4b5563;">Referral
                        Pipeline</h5>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Referrer</th>
                                <th>Referred Company</th>
                                <th>Status</th>
                                <th>Potential MRR</th>
                            </tr>
                        </thead>
                        <tbody id="referralTableBody">
                            <!-- Populated by JS -->
                        </tbody>
                    </table>
                    <!-- Referral Pagination -->
                    <div class="pagination-container" id="referralPagination">
                        <!-- Populated by JS -->
                    </div>
                </div>
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 12px; color: #4b5563;">✨ Advocacy
                        Candidates</h5>
                    <div class="advocacy-list">
                        <div class="advocacy-item">
                            <div class="advocacy-info">
                                <div class="advocacy-name">Acme Corp</div>
                                <div class="advocacy-company">Priya Sharma "Wow, AI with Multicloud"</div>
                                <div class="advocacy-note">"Good for next case study"</div>
                            </div>
                            <div class="advocacy-score">
                                <div class="score-value">98 %</div>
                                <button class="action-btn">➜</button>
                            </div>
                        </div>
                        <div class="advocacy-item">
                            <div class="advocacy-info">
                                <div class="advocacy-name">Beta Solutions</div>
                                <div class="advocacy-company">Rajesh Malhotra "Really satisfied"</div>
                                <div class="advocacy-note">"Good on next support visit"</div>
                            </div>
                            <div class="advocacy-score">
                                <div class="score-value">98 %</div>
                                <button class="action-btn">➜</button>
                            </div>
                        </div>
                        <div class="advocacy-item">
                            <div class="advocacy-info">
                                <div class="advocacy-name">Epsilon Inc</div>
                                <div class="advocacy-company">Sanaa Mehra "Partner of choice"</div>
                                <div class="advocacy-note">"Ready to refer again"</div>
                            </div>
                            <div class="advocacy-score">
                                <div class="score-value">94 %</div>
                                <button class="action-btn">➜</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Tickets & Experience -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-title-icon">🎧</span>
                    Support Tickets & Experience
                </h3>
            </div>
            <div class="support-stats">
                <div class="support-stat">
                    <div class="support-stat-value">45</div>
                    <div class="support-stat-label">Open Tickets</div>
                </div>
                <div class="support-stat">
                    <div class="support-stat-value">5</div>
                    <div class="support-stat-label">Escalated</div>
                </div>
                <div class="support-stat">
                    <div class="support-stat-value">4.2h</div>
                    <div class="support-stat-label">Avg Response Time</div>
                </div>
                <div class="support-stat">
                    <div class="support-stat-value">4.3/5</div>
                    <div class="support-stat-label">CSAT Score</div>
                </div>
            </div>
            <div class="support-grid">
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 16px; color: #6b7280;">By Priority</h5>
                    <canvas id="priorityChart" style="max-height: 200px;"></canvas>
                    <div class="health-legend">
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #dbeafe;"></div>
                                <span class="legend-label">Off 5</span>
                            </div>
                            <span class="legend-value">9</span>
                        </div>
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #fed7aa;"></div>
                                <span class="legend-label">Medium</span>
                            </div>
                            <span class="legend-value">22</span>
                        </div>
                        <div class="legend-item">
                            <div style="display: flex; align-items: center;">
                                <div class="legend-color" style="background: #fef3c7;"></div>
                                <span class="legend-label">Low</span>
                            </div>
                            <span class="legend-value">14</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h5 style="font-size: 14px; font-weight: 600; margin-bottom: 12px; color: #6b7280;">Critical & High
                        Priority Tickets</h5>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Ticket</th>
                                <th>Account</th>
                                <th>Priority</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>N7876768<br><small style="color: #9ca3af;">VM resource increased</small></td>
                                <td>Acme Corp</td>
                                <td><span class="badge badge-danger">Critical</span></td>
                                <td>2d</td>
                            </tr>
                            <tr>
                                <td>N7876857<br><small style="color: #9ca3af;">DB backup assessment</small></td>
                                <td>Beta Solutions</td>
                                <td><span class="badge badge-warning">High</span></td>
                                <td>1d</td>
                            </tr>
                            <tr>
                                <td>N7867838<br><small style="color: #9ca3af;">Domain help</small></td>
                                <td>Gamma Tech</td>
                                <td><span class="badge badge-warning">Medium</span></td>
                                <td>5h</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Product & Activity Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="section-card">
                    <div class="section-header">
                        <h3 class="section-title">
                            <span class="section-title-icon">📦</span>
                            Product Adoption
                        </h3>
                    </div>
                    <div class="product-list">
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">☁️</div>
                                <div>
                                    <div class="product-name">Cloud Instances</div>
                                    <div class="product-users">145 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-info">87%</span>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">🔧</div>
                                <div>
                                    <div class="product-name">Kubernetes</div>
                                    <div class="product-users">89 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-info">65%</span>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">💾</div>
                                <div>
                                    <div class="product-name">Databases</div>
                                    <div class="product-users">94 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-gray">Medium</span>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">🗄️</div>
                                <div>
                                    <div class="product-name">Object Storage</div>
                                    <div class="product-users">76 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-info">59%</span>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">⚖️</div>
                                <div>
                                    <div class="product-name">Load Balancers</div>
                                    <div class="product-users">42 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-gray">Medium</span>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-icon">🔄</div>
                                <div>
                                    <div class="product-name">Other Services</div>
                                    <div class="product-users">34 accounts</div>
                                </div>
                            </div>
                            <div class="product-adoption">
                                <span class="badge badge-gray">Low</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="section-card">
                    <div class="section-header">
                        <h3 class="section-title">
                            <span class="section-title-icon">📝</span>
                            Recent Activity
                        </h3>
                        <select class="filter-select">
                            <option>My activity</option>
                            <option>All activity</option>
                        </select>
                    </div>
                    <div class="activity-timeline">
                        <div class="activity-item">
                            <div class="activity-icon renewal">✅</div>
                            <div class="activity-content">
                                <div class="activity-title">Renewal closed: ACME</div>
                                <div class="activity-desc">Acme Corp a new Kubernetes add-on for 12M+K/E/P</div>
                                <div class="activity-meta">
                                    <span>2 minutes ago</span>
                                    <span>•</span>
                                    <span>Priya</span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon qbr">📅</div>
                            <div class="activity-content">
                                <div class="activity-title">QBR completed</div>
                                <div class="activity-desc">Beta Solutions reviewed all goals and KPIs</div>
                                <div class="activity-meta">
                                    <span>9 minutes ago</span>
                                    <span>•</span>
                                    <span>You</span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon upsell">💰</div>
                            <div class="activity-content">
                                <div class="activity-title">Upsell achieved</div>
                                <div class="activity-desc">Deals with a double their K8s unit + 5 DB add-on</div>
                                <div class="activity-meta">
                                    <span>5 minutes ago</span>
                                    <span>•</span>
                                    <span>Amit Patel</span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon churn">❌</div>
                            <div class="activity-content">
                                <div class="activity-title">Churn alert: 3Q50(SL) - Reason: Budget cuts</div>
                                <div class="activity-desc">Epsilon Infotech did not move renewal + opted ARR+K</div>
                                <div class="activity-meta">
                                    <span>1 day ago</span>
                                    <span>•</span>
                                    <span>Rajesh Kr</span>
                                    <span class="badge badge-danger">Lost</span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon renewal">📞</div>
                            <div class="activity-content">
                                <div class="activity-title">Customer call</div>
                                <div class="activity-desc">Weekly touchbase with TechVision about integration</div>
                                <div class="activity-meta">
                                    <span>2 days ago</span>
                                    <span>•</span>
                                    <span>You</span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon qbr">📧</div>
                            <div class="activity-content">
                                <div class="activity-title">Follow-up sent</div>
                                <div class="activity-desc">Sent renewal proposal + pricing to CloudBase SO</div>
                                <div class="activity-meta">
                                    <span>2 days ago</span>
                                    <span>•</span>
                                    <span>Neha M</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Details Modal -->
    <div class="modal fade" id="accountDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title" id="accountModalTitle">#194324 > Company Name - Contact Name</h5>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-primary btn-sm">Add Deal</button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="account-header">
                        <div class="account-avatar">👤</div>
                        <div>
                            <div class="account-name-title" id="modalAccountName">Mayank Jain</div>
                            <div style="display: flex; gap: 8px;">
                                <button class="btn btn-outline-secondary btn-sm">📞</button>
                                <button class="btn btn-outline-secondary btn-sm">✏️</button>
                            </div>
                        </div>
                    </div>

                    <div class="account-stats-grid">
                        <div class="account-stat-box">
                            <div class="account-stat-label">Customer Since</div>
                            <div class="account-stat-value" id="modalCustomerSince">2023-08-02 11:59:15</div>
                        </div>
                        <div class="account-stat-box">
                            <div class="account-stat-label">Current Credit</div>
                            <div class="account-stat-value" id="modalCurrentCredit">Rs.124.66</div>
                        </div>
                        <div class="account-stat-box">
                            <div class="account-stat-label">Free Credit & Expiry</div>
                            <div class="account-stat-value" id="modalFreeCredit">Rs.0 (null)</div>
                        </div>
                        <div class="account-stat-box">
                            <div class="account-stat-label">Total Business done</div>
                            <div class="account-stat-value" id="modalTotalBusiness">Rs.517562.01</div>
                        </div>
                    </div>

                    <div class="account-stat-box" style="margin-bottom: 20px;">
                        <div class="account-stat-label">Recent Coupon</div>
                        <div class="account-stat-value" id="modalRecentCoupon">null</div>
                    </div>

                    <div class="account-info-grid">
                        <div class="account-info-item">
                            <label>Firstname</label>
                            <span id="modalFirstname">Mayank</span>
                        </div>
                        <div class="account-info-item">
                            <label>Lastname</label>
                            <span id="modalLastname">Jain</span>
                        </div>
                        <div class="account-info-item">
                            <label>Job Title</label>
                            <span id="modalJobTitle">-</span>
                        </div>
                        <div class="account-info-item">
                            <label>Mobile</label>
                            <span id="modalMobile">+919925037646</span>
                        </div>
                    </div>

                    <div class="account-info-grid">
                        <div class="account-info-item">
                            <label>Email</label>
                            <span id="modalEmail">mayank@mymobioffice.com</span>
                        </div>
                        <div class="account-info-item">
                            <label>City</label>
                            <span id="modalCity">-</span>
                        </div>
                        <div class="account-info-item">
                            <label>State</label>
                            <span id="modalState">-</span>
                        </div>
                        <div class="account-info-item">
                            <label>Country</label>
                            <span id="modalCountry">-</span>
                        </div>
                    </div>

                    <div class="account-info-grid">
                        <div class="account-info-item">
                            <label>Owner</label>
                            <span id="modalOwner" style="text-decoration: underline;">Anushree</span>
                        </div>
                        <div class="account-info-item">
                            <label>Status</label>
                            <span id="modalStatus">Active</span>
                        </div>
                        <div class="account-info-item">
                            <label>Source</label>
                            <span id="modalSource" class="badge" style="background: #6b7280; color: white;">Cloud
                                Account</span>
                        </div>
                        <div class="account-info-item">
                            <label>Medium</label>
                            <span id="modalMedium">0</span>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="tab-nav">
                        <button class="active" onclick="switchTab('activity')">💬 Activity</button>
                        <button onclick="switchTab('notes')">📝 Notes</button>
                        <button onclick="switchTab('invoices')">📋 Invoices</button>
                        <button onclick="switchTab('cloud')">☁️ Cloud List</button>
                        <button onclick="switchTab('calls')">📞 Calls</button>
                        <button onclick="switchTab('logs')">📊 Logs</button>
                        <button onclick="switchTab('customers')">👥 Customers</button>
                    </div>

                    <!-- Activity Tab Content -->
                    <div id="tabContent">
                        <div style="margin-bottom: 16px;">
                            <textarea class="form-control" rows="3" placeholder="Add a note or activity..."></textarea>
                        </div>
                        <div style="display: flex; gap: 16px; margin-bottom: 16px;">
                            <div class="form-group">
                                <label>Due At</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control">
                                    <option>Call</option>
                                    <option>Email</option>
                                    <option>Meeting</option>
                                    <option>Task</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm">Add Followup</button>

                        <div style="margin-top: 20px;" id="activityList">
                            <!-- Activity entries populated by JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Referral Modal -->
    <div class="modal fade" id="addReferralModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Referral</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addReferralForm">
                        <div class="mb-3">
                            <label class="form-label-custom">Referrer *</label>
                            <select class="form-control" id="referralUserId" required>
                                <option value="">Select User ID</option>
                                <!-- Populated by JS from followups -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label-custom">Referred Company *</label>
                            <input type="text" class="form-control" id="referralCompany" required
                                placeholder="Enter referred company">
                        </div>
                        <div class="mb-3">
                            <label class="form-label-custom">Status *</label>
                            <select class="form-control" id="referralStatus" required>
                                <option value="">Select Status</option>
                                <option value="New">New</option>
                                <option value="Interested">Interested</option>
                                <option value="In contact">In Contact</option>
                                <option value="Converted">Converted</option>
                                <option value="Lost">Lost</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label-custom">Potential MRR</label>
                            <input type="text" class="form-control" id="referralMRR" placeholder="₹0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitReferral()">Add Referral</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // API Configuration
        const API_URL = 'account-management-api.php';

        // Global data storage
        let dashboardData = {};
        let followupsData = [];
        let referralsData = [];
        let currentFollowupPage = 1;
        let currentReferralPage = 1;
        const itemsPerPage = 5;

        // Status options for Account Status dropdown
        const accountStatusOptions = ['FEED BACK', 'QBR', 'UP SELL', 'CROSS SELL', 'NEGOTIATION', 'DELETED'];
        const renewalStatusOptions = ['Prepared Lost', 'Renewed', 'In Process', 'Closed', 'Pending'];

        // Initialize Charts
        function initCharts() {
            // Health Distribution Chart
            const healthCtx = document.getElementById('healthChart').getContext('2d');
            new Chart(healthCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Healthy', 'Watchlist', 'At Risk', 'Critical'],
                    datasets: [{
                        data: [85, 34, 19, 9],
                        backgroundColor: ['#15803d', '#eab308', '#f97316', '#dc2626'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    cutout: '70%'
                }
            });

            // MRR Trend Chart
            const mrrCtx = document.getElementById('mrrChart').getContext('2d');
            new Chart(mrrCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [
                        {
                            label: 'Existing MRR',
                            data: [38, 39, 40, 41, 42, 42.8],
                            borderColor: '#15803d',
                            backgroundColor: 'rgba(21, 128, 61, 0.1)',
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Collection MRR',
                            data: [36, 37, 38, 39, 40, 41],
                            borderColor: '#f97316',
                            backgroundColor: 'rgba(249, 115, 22, 0.1)',
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: { callback: function (value) { return '₹' + value + 'L'; } }
                        }
                    }
                }
            });

            // Priority Chart
            const priorityCtx = document.getElementById('priorityChart').getContext('2d');
            new Chart(priorityCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Critical', 'High', 'Medium', 'Low'],
                    datasets: [{
                        data: [5, 9, 22, 14],
                        backgroundColor: ['#dc2626', '#f97316', '#fbbf24', '#dbeafe'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    cutout: '70%'
                }
            });
        }

        // Render Upcoming Renewals with status dropdown
        function renderRenewals(renewals) {
            const tbody = document.getElementById('renewalsTableBody');
            tbody.innerHTML = renewals.map((r, idx) => `
                <tr>
                    <td>${r.date}</td>
                    <td>${r.account}<br><small style="color: #9ca3af;">${r.manager}</small></td>
                    <td>₹${(r.mrr).toLocaleString()}</td>
                    <td>
                        <select class="status-select" onchange="updateRenewalStatus(${idx}, this.value)">
                            ${renewalStatusOptions.map(opt =>
                            `<option value="${opt}" ${r.status === opt ? 'selected' : ''}>${opt}</option>`
                        ).join('')}
                        </select>
                    </td>
                </tr>
            `).join('');
        }

        // Update renewal status
        async function updateRenewalStatus(index, newStatus) {
            const renewal = dashboardData.renewals[index];
            try {
                await fetch(API_URL, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        type: 'renewal',
                        id: renewal.id || index,
                        status: newStatus
                    })
                });
                dashboardData.renewals[index].status = newStatus;
                console.log('Renewal status updated:', newStatus);
            } catch (error) {
                console.error('Error updating renewal status:', error);
            }
        }

        // Render Follow-ups Table with Account Status dropdown
        function renderFollowups(followups, page = 1) {
            const tbody = document.getElementById('followupsTableBody');
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedData = followups.slice(start, end);

            tbody.innerHTML = paginatedData.map((f, idx) => {
                const actualIdx = start + idx;
                const showAmount = f.accountStatus === 'UP SELL' || f.accountStatus === 'CROSS SELL';
                return `
                <tr>
                    <td>${actualIdx + 1}</td>
                    <td>${f.type}</td>
                    <td>${f.followupTime}</td>
                    <td><a href="javascript:void(0)" class="account-link" onclick="openAccountDetails(${actualIdx})">${f.accountName}</a></td>
                    <td>${f.lastMessage}</td>
                    <td>${f.assignedTo}</td>
                    <td>${f.department}</td>
                    <td>${f.userId}</td>
                    <td>
                        <select class="status-select" onchange="updateFollowupStatus(${actualIdx}, this.value)">
                            ${accountStatusOptions.map(opt =>
                    `<option value="${opt}" ${f.accountStatus === opt ? 'selected' : ''}>${opt}</option>`
                ).join('')}
                        </select>
                        ${showAmount ? `<div class="status-amount">₹${(f.amount || 0).toLocaleString()}</div>` : ''}
                    </td>
                    <td>${f.entryTime}</td>
                    <td><span class="badge ${f.completed ? 'bg-success' : 'bg-secondary'}">${f.completed ? 'Yes' : 'No'}</span></td>
                </tr>
            `}).join('');

            renderPagination('followupsPagination', followups.length, page, (newPage) => {
                currentFollowupPage = newPage;
                renderFollowups(followupsData, newPage);
            });

            // Populate User ID dropdown for referral form
            populateUserIdDropdown(followups);
        }

        // Update followup account status
        async function updateFollowupStatus(index, newStatus) {
            const followup = followupsData[index];
            try {
                await fetch(API_URL, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        type: 'followup',
                        id: followup.id || index,
                        accountStatus: newStatus
                    })
                });
                followupsData[index].accountStatus = newStatus;
                renderFollowups(followupsData, currentFollowupPage);
                console.log('Followup status updated:', newStatus);
            } catch (error) {
                console.error('Error updating followup status:', error);
            }
        }

        // Render Referral Pipeline with status dropdown
        function renderReferrals(referrals, page = 1) {
            const tbody = document.getElementById('referralTableBody');
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedData = referrals.slice(start, end);

            const statusOptions = ['New', 'Interested', 'In contact', 'Converted', 'Lost'];

            tbody.innerHTML = paginatedData.map((r, idx) => {
                const actualIdx = start + idx;
                const statusClass = r.status === 'Interested' ? 'badge-info' :
                    r.status === 'In contact' ? 'badge-warning' :
                        r.status === 'Converted' ? 'badge-success' :
                            r.status === 'Lost' ? 'badge-danger' : 'badge-gray';
                return `
                <tr>
                    <td>${r.referrer}</td>
                    <td>${r.referred}</td>
                    <td>
                        <select class="status-select" onchange="updateReferralStatus(${actualIdx}, this.value)">
                            ${statusOptions.map(opt =>
                    `<option value="${opt}" ${r.status === opt ? 'selected' : ''}>${opt}</option>`
                ).join('')}
                        </select>
                    </td>
                    <td>₹${(r.mrr).toLocaleString()}</td>
                </tr>
            `}).join('');

            renderPagination('referralPagination', referrals.length, page, (newPage) => {
                currentReferralPage = newPage;
                renderReferrals(referralsData, newPage);
            });
        }

        // Update referral status
        async function updateReferralStatus(index, newStatus) {
            try {
                await fetch(API_URL, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        type: 'referral',
                        id: referralsData[index].id || index,
                        status: newStatus
                    })
                });
                referralsData[index].status = newStatus;
                renderReferrals(referralsData, currentReferralPage);
                console.log('Referral status updated:', newStatus);
            } catch (error) {
                console.error('Error updating referral status:', error);
            }
        }

        // Render Pagination
        function renderPagination(containerId, totalItems, currentPage, onPageChange) {
            const container = document.getElementById(containerId);
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let html = '<button class="pagination-btn" onclick="' + containerId + 'GoTo(' + Math.max(1, currentPage - 1) + ')" ' + (currentPage === 1 ? 'disabled' : '') + '>‹</button>';

            // Show first pages
            for (let i = 1; i <= Math.min(3, totalPages); i++) {
                html += `<button class="pagination-btn ${currentPage === i ? 'active' : ''}" onclick="${containerId}GoTo(${i})">${i}</button>`;
            }

            if (totalPages > 6) {
                html += `<input type="number" class="pagination-input" placeholder="..." min="1" max="${totalPages}" onchange="${containerId}GoTo(parseInt(this.value))">`;
            }

            // Show last pages
            for (let i = Math.max(4, totalPages - 2); i <= totalPages; i++) {
                if (i > 3) {
                    html += `<button class="pagination-btn ${currentPage === i ? 'active' : ''}" onclick="${containerId}GoTo(${i})">${i}</button>`;
                }
            }

            html += '<button class="pagination-btn" onclick="' + containerId + 'GoTo(' + Math.min(totalPages, currentPage + 1) + ')" ' + (currentPage === totalPages ? 'disabled' : '') + '>›</button>';
b
            container.innerHTML = html;

            // Define global functions for pagination
            window[containerId + 'GoTo'] = function (page) {
                onPageChange(page);
            };
        }

        // Open Account Details Modal
        function openAccountDetails(index) {
            const followup = followupsData[index];
            const account = followup.accountDetails || {};

            document.getElementById('accountModalTitle').textContent = `#${account.id || index} > ${account.company || followup.accountName} - ${account.contactName || followup.assignedTo}`;
            document.getElementById('modalAccountName').textContent = account.contactName || followup.accountName;
            document.getElementById('modalCustomerSince').textContent = account.customerSince || '-';
            document.getElementById('modalCurrentCredit').textContent = account.currentCredit || 'Rs.0';
            document.getElementById('modalFreeCredit').textContent = account.freeCredit || 'Rs.0 (null)';
            document.getElementById('modalTotalBusiness').textContent = account.totalBusiness || 'Rs.0';
            document.getElementById('modalRecentCoupon').textContent = account.recentCoupon || 'null';
            document.getElementById('modalFirstname').textContent = account.firstname || '-';
            document.getElementById('modalLastname').textContent = account.lastname || '-';
            document.getElementById('modalJobTitle').textContent = account.jobTitle || '-';
            document.getElementById('modalMobile').textContent = account.mobile || '-';
            document.getElementById('modalEmail').textContent = account.email || '-';
            document.getElementById('modalCity').textContent = account.city || '-';
            document.getElementById('modalState').textContent = account.state || '-';
            document.getElementById('modalCountry').textContent = account.country || '-';
            document.getElementById('modalOwner').textContent = account.owner || followup.assignedTo;
            document.getElementById('modalStatus').textContent = account.status || 'Active';
            document.getElementById('modalMedium').textContent = account.medium || '0';

            // Render activities
            renderAccountActivities(account.activities || []);

            const modal = new bootstrap.Modal(document.getElementById('accountDetailsModal'));
            modal.show();
        }

        // Render Account Activities
        function renderAccountActivities(activities) {
            const container = document.getElementById('activityList');
            if (!activities || activities.length === 0) {
                container.innerHTML = '<p class="text-muted">No activities yet.</p>';
                return;
            }
            container.innerHTML = activities.map(a => `
                <div class="activity-entry">
                    <div class="activity-icon-circle">📞</div>
                    <div class="activity-entry-content">
                        <div class="activity-entry-header">
                            <div>
                                <input type="checkbox" ${a.completed ? 'checked' : ''}>
                                <strong>${a.user}</strong> at ${a.createdAt}
                            </div>
                            <span style="color: #6b7280; font-size: 12px;">📅 ${a.dueAt}</span>
                        </div>
                        <p style="margin: 4px 0; color: #4b5563;">${a.description}</p>
                        <div class="note-input-row">
                            <input type="text" placeholder="Add a note...">
                            <button class="btn btn-primary btn-sm">Add Note</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Switch tab in account details modal
        function switchTab(tabName) {
            document.querySelectorAll('.tab-nav button').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            // Tab content switching would be implemented here
        }

        // Open Add Referral Modal
        function openAddReferralModal() {
            document.getElementById('addReferralForm').reset();
            const modal = new bootstrap.Modal(document.getElementById('addReferralModal'));
            modal.show();
        }

        // Populate User ID dropdown from followups
        function populateUserIdDropdown(followups) {
            const select = document.getElementById('referralUserId');
            const uniqueUserIds = [...new Set(followups.map(f => f.userId))];
            select.innerHTML = '<option value="">Select User ID</option>' +
            uniqueUserIds.map(uid => `<option value="${uid}">${uid}</option>`).join('');
        }

        // Submit new referral
        async function submitReferral() {
            const form = document.getElementById('addReferralForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const newReferral = {
                referrer: document.getElementById('referralReferrer').value,
                referred: document.getElementById('referralCompany').value,
                status: document.getElementById('referralStatus').value,
                userId: document.getElementById('referralUserId').value,
                mrr: parseInt(document.getElementById('referralMRR').value.replace(/[^0-9]/g, '')) || 0
            };

            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ type: 'referral', data: newReferral })
                });

                referralsData.push(newReferral);
                renderReferrals(referralsData, currentReferralPage);

                bootstrap.Modal.getInstance(document.getElementById('addReferralModal')).hide();
                console.log('Referral added successfully');
            } catch (error) {
                console.error('Error adding referral:', error);
            }
        }

        // Apply followup filters
        function applyFollowupFilters() {
            const department = document.getElementById('filterDepartment').value;
            const dateFrom = document.getElementById('filterDateFrom').value;
            const dateTo = document.getElementById('filterDateTo').value;
            const refType = document.getElementById('filterRefType').value;
            const refId = document.getElementById('filterRefId').value.toLowerCase();

            let filtered = [...dashboardData.followUps];

            if (department) filtered = filtered.filter(f => f.department === department);
            if (refType) filtered = filtered.filter(f => f.type === refType);
            if (refId) filtered = filtered.filter(f => f.userId.toLowerCase().includes(refId));
            // Date filtering would be implemented with proper date comparison

            followupsData = filtered;
            currentFollowupPage = 1;
            renderFollowups(filtered, 1);
        }

        // Clear followup filters
        function clearFollowupFilters() {
            document.getElementById('filterDepartment').value = '';
            document.getElementById('filterDateFrom').value = '';
            document.getElementById('filterDateTo').value = '';
            document.getElementById('filterRefType').value = '';
            document.getElementById('filterRefId').value = '';

            followupsData = [...dashboardData.followUps];
            currentFollowupPage = 1;
            renderFollowups(followupsData, 1);
        }

        // Load data and initialize
        async function loadDashboard() {
            try {
                const response = await fetch(API_URL);
                dashboardData = await response.json();

                // Update KPI cards
                if (dashboardData.followupKpis) {
                    document.getElementById('kpi-overdue').textContent = dashboardData.followupKpis.overdue || 8;
                    document.getElementById('kpi-today').textContent = dashboardData.followupKpis.today || 5;
                    document.getElementById('kpi-week').textContent = dashboardData.followupKpis.week || 12;
                    document.getElementById('kpi-month').textContent = dashboardData.followupKpis.month || 28;
                }

                // Render renewals with status dropdown
                if (dashboardData.renewals) {
                    renderRenewals(dashboardData.renewals);
                }

                // Render followups
                if (dashboardData.followUps) {
                    followupsData = dashboardData.followUps;
                    renderFollowups(followupsData, 1);
                }

                // Render referrals
                if (dashboardData.referralPipeline) {
                    referralsData = dashboardData.referralPipeline;
                    renderReferrals(referralsData, 1);
                }

                // Initialize charts
                initCharts();

                console.log('Dashboard loaded successfully');
            } catch (error) {
                console.error('Error loading dashboard:', error);
            }
        }

        // Initialize dashboard on page load
        document.addEventListener('DOMContentLoaded', loadDashboard);
    </script>
</body>

</html>