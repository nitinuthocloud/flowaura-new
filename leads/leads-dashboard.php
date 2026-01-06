<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Generation Dashboard - Utho CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8fafc;
            font-size: 14px;
        }
        

        /* Main Content */
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
        }

        /* Top Header */
        .top-header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 32px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .page-subtitle {
            font-size: 14px;
            color: #64748b;
            margin-top: 4px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Filter Bar */
        .filter-bar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 32px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-label {
            font-size: 14px;
            font-weight: 600;
            color: #475569;
        }

        .filter-bar select {
            padding: 8px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        .btn-filter {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        /* Content Area */
        .content-area {
            padding: 24px 32px;
        }

        /* KPI Cards */
        .kpi-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .kpi-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .kpi-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .kpi-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .kpi-value {
            font-size: 32px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
            margin-bottom: 8px;
        }

        .kpi-label {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .kpi-trend {
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .trend-up {
            background: #dcfce7;
            color: #16a34a;
        }

        .trend-down {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Icon Colors */
        .icon-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .icon-green {
            background: #dcfce7;
            color: #16a34a;
        }

        .icon-purple {
            background: #e9d5ff;
            color: #9333ea;
        }

        .icon-orange {
            background: #fed7aa;
            color: #ea580c;
        }

        .icon-red {
            background: #fee2e2;
            color: #dc2626;
        }

        .icon-cyan {
            background: #cffafe;
            color: #0891b2;
        }

        .icon-pink {
            background: #fce7f3;
            color: #db2777;
        }

        .icon-yellow {
            background: #fef3c7;
            color: #ca8a04;
        }

        /* Team Sections */
        .team-section {
            background: white;
            border-radius: 12px;
            padding: 28px;
            margin-bottom: 32px;
            border: 2px solid #e2e8f0;
        }

        .team-section.inbound {
            border-color: #3b82f6;
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 100%);
        }

        .team-section.outbound {
            border-color: #10b981;
            background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 100%);
        }

        .team-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
        }

        .team-title {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .team-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .team-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
        }

        .badge-inbound {
            background: #3b82f6;
            color: white;
        }

        .badge-outbound {
            background: #10b981;
            color: white;
        }

        /* Charts Section */
        .charts-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid #e2e8f0;
        }

        .chart-title {
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        /* Status Table */
        .status-table-section {
            background: white;
            border-radius: 12px;
            padding: 28px;
            margin-bottom: 24px;
            border: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .section-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 20px;
        }

        /* Data Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table thead {
            background: #f8fafc;
        }

        .data-table th {
            padding: 14px 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        .data-table td {
            padding: 14px 16px;
            color: #0f172a;
            border-bottom: 1px solid #f1f5f9;
        }

        .data-table tbody tr:hover {
            background: #f8fafc;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-not-called {
            background: #f1f5f9;
            color: #475569;
        }

        .status-invalid {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-no-answer {
            background: #fef3c7;
            color: #92400e;
        }

        .status-not-interested {
            background: #fecaca;
            color: #991b1b;
        }

        .status-meeting {
            background: #d1fae5;
            color: #065f46;
        }

        .status-followup {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-dnc {
            background: #1f2937;
            color: white;
        }

        .status-callback {
            background: #e0e7ff;
            color: #3730a3;
        }

        .status-no-longer {
            background: #fed7aa;
            color: #9a3412;
        }

        .status-sent-info {
            background: #fef3c7;
            color: #854d0e;
        }

        .status-lock-in {
            background: #dcfce7;
            color: #14532d;
        }

        .status-wrong {
            background: #fecaca;
            color: #7f1d1d;
        }

        .status-disconnect {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Progress Bars */
        .progress-bar-container {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s;
        }

        .progress-green {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .progress-blue {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
        }

        .progress-orange {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .progress-red {
            background: linear-gradient(90deg, #ef4444, #dc2626);
        }

        /* Quality Score Bars */
        .quality-bar-container {
            margin-bottom: 16px;
        }

        .quality-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .quality-label-text {
            font-weight: 500;
            color: #475569;
        }

        .quality-value {
            font-weight: 600;
            color: #0f172a;
        }

        .quality-bar {
            width: 100%;
            height: 28px;
            background: #f1f5f9;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }

        .quality-fill {
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 12px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            transition: width 0.3s;
        }

        .quality-excellent {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .quality-good {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
        }

        .quality-fair {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        /* Stat Cards */
        .stat-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-top: 8px;
            font-weight: 500;
        }

        .stat-change {
            font-size: 11px;
            margin-top: 6px;
            font-weight: 600;
        }

        /* Action Buttons */
        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: #f1f5f9;
            color: #64748b;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            margin: 0 2px;
        }

        .action-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
            transform: scale(1.05);
        }

        /* Loading */
        .loading {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .loading i {
            font-size: 48px;
            margin-bottom: 16px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-logo,
            .nav-item span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }

            .kpi-row {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .charts-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <?php include "../sidebar.php" ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="page-title">Lead Generation Dashboard</h1>
                    <p class="page-subtitle">Track Lead Quality, Calling Status & Outcomes - Inbound & Outbound Teams
                    </p>
                </div>
                <div class="header-actions">
                    <button class="btn-filter btn-secondary"><i class="bi bi-download"></i> Export</button>
                    <button class="btn-filter btn-primary"><i class="bi bi-eye"></i> View</button>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <span class="filter-label">17 - Month</span>
            <select id="teamFilter">
                <option>All Team</option>
                <option>Inbound Team</option>
                <option>Outbound Team</option>
            </select>
            <select id="timeFilter">
                <option>This Month</option>
                <option>Last 7 Days</option>
                <option>Last 30 Days</option>
                <option>This Quarter</option>
            </select>
            <select id="sourceFilter">
                <option>All Source</option>
                <option>Website</option>
                <option>Apollo</option>
                <option>Email Campaign</option>
                <option>WhatsApp</option>
            </select>
            <select id="ownerFilter">
                <option>Owner</option>
                <option>My Leads</option>
                <option>Team Leads</option>
            </select>
            <button class="btn-filter btn-primary">Apply</button>
            <div style="margin-left: auto; display: flex; align-items: center; gap: 8px;">
                <span style="color: #64748b; font-size: 13px;">Filter: XYZ</span>
                <button class="btn-filter btn-secondary">Q1 2025</button>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">

            <!-- Global KPI Cards - Row 1 -->
            <div class="kpi-row">
                <div class="kpi-card">
                    <div class="kpi-icon icon-blue"><i class="bi bi-people-fill"></i></div>
                    <div class="kpi-value">2,627</div>
                    <div class="kpi-label">Total Leads</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 12%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-green"><i class="bi bi-telephone-fill"></i></div>
                    <div class="kpi-value">1,652</div>
                    <div class="kpi-label">Total Called</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 8%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-cyan"><i class="bi bi-calendar-week"></i></div>
                    <div class="kpi-value">1,245</div>
                    <div class="kpi-label">Connected</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 15%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-orange"><i class="bi bi-calendar-day"></i></div>
                    <div class="kpi-value">342</div>
                    <div class="kpi-label">Meetings Scheduled</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 5%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-red"><i class="bi bi-clock-history"></i></div>
                    <div class="kpi-value">267</div>
                    <div class="kpi-label">Meetings Attended</div>
                    <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-red"><i class="bi bi-clock-history"></i></div>
                    <div class="kpi-value">267</div>
                    <div class="kpi-label">Qualified Leads</div>
                    <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-red"><i class="bi bi-clock-history"></i></div>
                    <div class="kpi-value">267</div>
                    <div class="kpi-label">Disqualified</div>
                    <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-red"><i class="bi bi-clock-history"></i></div>
                    <div class="kpi-value">267</div>
                    <div class="kpi-label">Follow-up Required</div>
                    <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-red"><i class="bi bi-clock-history"></i></div>
                    <div class="kpi-value">267</div>
                    <div class="kpi-label">Urgent (48h+)</div>
                    <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
            </div>

            <!-- Global KPI Cards - Row 2 -->
            <div class="kpi-row">
                <div class="kpi-card">
                    <div class="kpi-icon icon-purple"><i class="bi bi-telephone-outbound"></i></div>
                    <div class="kpi-value">198</div>
                    <div class="kpi-label">Call in Last 7</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 10%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-green"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="kpi-value">512</div>
                    <div class="kpi-label">Contact Rate</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 6%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-yellow"><i class="bi bi-arrow-repeat"></i></div>
                    <div class="kpi-value">406</div>
                    <div class="kpi-label">Total in Follow Up</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 7%</span>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon icon-orange"><i class="bi bi-person-check"></i></div>
                    <div class="kpi-value">89</div>
                    <div class="kpi-label">Sign Ups</div>
                    <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 9%</span>
                </div>
            </div>

            <!-- INBOUND LEADS SECTION -->
            <div class="team-section inbound">
                <div class="team-header">
                    <div>
                        <h2 class="team-title">Inbound Leads (Website Signups)</h2>
                        <p class="team-subtitle">First contact attempt within 5 min - Email + WhatsApp + Call (Max 3
                            days)</p>
                    </div>
                    <span class="team-badge badge-inbound">INBOUND TEAM</span>
                </div>

                <!-- Inbound KPI Cards - Row 1 -->
                <div class="kpi-row">
                    <div class="kpi-card">
                        <div class="kpi-icon icon-blue"><i class="bi bi-cursor-fill"></i></div>
                        <div class="kpi-value">845</div>
                        <div class="kpi-label">Website Leads</div>
                        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-green"><i class="bi bi-fire"></i></div>
                        <div class="kpi-value">773</div>
                        <div class="kpi-label">Hot Leads</div>
                        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 11%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-cyan"><i class="bi bi-hourglass-split"></i></div>
                        <div class="kpi-value">612</div>
                        <div class="kpi-label">Waiting in Queue</div>
                        <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 5%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-purple"><i class="bi bi-telephone-inbound"></i></div>
                        <div class="kpi-value">688</div>
                        <div class="kpi-label">Connected in Call</div>
                        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 13%</span>
                    </div>
                </div>

                <!-- Inbound KPI Cards - Row 2 -->
                <div class="kpi-row">
                    <div class="kpi-card">
                        <div class="kpi-icon icon-green"><i class="bi bi-calendar-check"></i></div>
                        <div class="kpi-value">254</div>
                        <div class="kpi-label">Scheduled Demos</div>
                        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 16%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-red"><i class="bi bi-x-circle-fill"></i></div>
                        <div class="kpi-value">98</div>
                        <div class="kpi-label">Lost in Queue</div>
                        <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 8%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-orange"><i class="bi bi-telephone-x"></i></div>
                        <div class="kpi-value">67</div>
                        <div class="kpi-label">No Answer</div>
                        <span class="kpi-trend trend-down"><i class="bi bi-arrow-down"></i> 4%</span>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-icon icon-yellow"><i class="bi bi-arrow-clockwise"></i></div>
                        <div class="kpi-value">4.3k</div>
                        <div class="kpi-label">Follow Ups</div>
                        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 7%</span>
                    </div>
                </div>

                <!-- Inbound Charts -->
                <div class="charts-row">
                    <div class="chart-card">
                        <h3 class="chart-title">Inbound Status Distribution</h3>
                        <div class="chart-container">
                            <canvas id="inboundFunnelChart"></canvas>
                        </div>
                    </div>
                    <div class="chart-card">
                        <h3 class="chart-title">Sourse Wise Distribution</h3>
                        <div class="chart-container">
                            <canvas id="inboundStatusChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OUTBOUND LEADS SECTION -->
            <div class="team-section outbound">
                <div class="team-header">
                    <div>
                        <h2 class="team-title">Outbound Leads (Cold Outreach)</h2>
                        <p class="team-subtitle">Apollo Data + Email Campaigns + WhatsApp Campaigns + Cold Calling</p>
                    </div>
                    <span class="team-badge badge-outbound">OUTBOUND TEAM</span>
                </div>

                <!-- Outbound KPI Cards - Row 1 -->
                <div class="kpi-row">

    <!-- Total Data Assigned -->
    <div class="kpi-card">
        <div class="kpi-icon icon-blue"><i class="bi bi-database"></i></div>
        <div class="kpi-value">3,450</div>
        <div class="kpi-label">Total Data Assigned</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 9%</span>
    </div>

    <!-- Total Cold Calls -->
    <div class="kpi-card">
        <div class="kpi-icon icon-purple"><i class="bi bi-telephone-outbound"></i></div>
        <div class="kpi-value">2,180</div>
        <div class="kpi-label">Total Cold Calls</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 12%</span>
    </div>

    <!-- Emails Sent -->
    <div class="kpi-card">
        <div class="kpi-icon icon-cyan"><i class="bi bi-envelope-paper"></i></div>
        <div class="kpi-value">2,856</div>
        <div class="kpi-label">Emails Sent</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 18%</span>
    </div>

    <!-- WhatsApp Sent -->
    <div class="kpi-card">
        <div class="kpi-icon icon-green"><i class="bi bi-whatsapp"></i></div>
        <div class="kpi-value">1,040</div>
        <div class="kpi-label">WhatsApp Sent</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 10%</span>
    </div>

    <!-- First Contact Made -->
    <div class="kpi-card">
        <div class="kpi-icon icon-orange"><i class="bi bi-person-check"></i></div>
        <div class="kpi-value">1,234</div>
        <div class="kpi-label">First Contact Made</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 6%</span>
    </div>

    <!-- Conversation Started -->
    <div class="kpi-card">
        <div class="kpi-icon icon-green"><i class="bi bi-chat-dots"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Conversation Started</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Qualified Prospects -->
    <div class="kpi-card">
        <div class="kpi-icon icon-green"><i class="bi bi-person-badge"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Qualified Prospects</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Not Interested -->
    <div class="kpi-card">
        <div class="kpi-icon icon-red"><i class="bi bi-hand-thumbs-down"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Not Interested</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Warm Follow-ups -->
    <div class="kpi-card">
        <div class="kpi-icon icon-yellow"><i class="bi bi-alarm"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Warm Follow-ups</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Meeting Scheduled -->
    <div class="kpi-card">
        <div class="kpi-icon icon-blue"><i class="bi bi-calendar-check"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Meeting Scheduled</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Meeting Joined -->
    <div class="kpi-card">
        <div class="kpi-icon icon-green"><i class="bi bi-people"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Meeting Joined</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Meeting Not Joined -->
    <div class="kpi-card">
        <div class="kpi-icon icon-red"><i class="bi bi-person-x"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Meeting Not Joined</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

    <!-- Re-engage -->
    <div class="kpi-card">
        <div class="kpi-icon icon-purple"><i class="bi bi-arrow-repeat"></i></div>
        <div class="kpi-value">892</div>
        <div class="kpi-label">Re-engage</div>
        <span class="kpi-trend trend-up"><i class="bi bi-arrow-up"></i> 14%</span>
    </div>

</div>



                <!-- Outbound Charts -->
                <div class="charts-row">
                    <div class="chart-card">
                        <h3 class="chart-title">Daily Outbound Activity</h3>
                        <div class="chart-container">
                            <canvas id="outboundActivityChart"></canvas>
                        </div>
                    </div>
                    <div class="chart-card">
                        <h3 class="chart-title">Conversion Rate Trends</h3>
                        <div class="chart-container">
                            <canvas id="conversionTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LEAD QUALITY ANALYTICS -->
            <div class="status-table-section">
                <h2 class="section-title">Lead Quality Analytics</h2>
                <p class="section-subtitle">Lead quality breakdown, use cases & cloud spend potential</p>

                <div class="row g-3 mt-3">
                    <!-- Use Case Distribution Chart -->
                    <div class="col-md-6">
                        <div class="chart-card">
                            <h3 class="chart-title">Use From (Cloud Providers)</h3>
                            <div class="chart-container" style="height: 250px;">
                                <canvas id="useCaseChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Quality Summary -->
                    <div class="col-md-6">
                        <div class="chart-card">
                            <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">Lead Quality Scores</h4>

                            <div style="height:260px;">
                                <canvas id="leadQualityChart"></canvas>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Lead Quality Scores -->
                <div class="mt-4">
                    <!-- Monthly Cloud Spend Potential -->
                    <div class="col-md-12">
                        <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">Monthly Cloud Spend
                            Potential</h4>
                        <div class="chart-container" style="height: 350px;">
                            <canvas id="cloudSpendChart"></canvas>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>

            <!-- UNIFIED LEAD STATUS OVERVIEW -->
            <div class="status-table-section">
                <h2 class="section-title">Unified Lead Status Overview</h2>
                <p class="section-subtitle">See All Status of Leads at a Single View</p>
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>STATUS</th>
                                <th style="text-align: right;">COUNT</th>
                                <th style="width: 50%; min-width: 300px;">DISTRIBUTION</th>
                            </tr>
                        </thead>
                        <tbody id="statusTableBody">
                            <tr>
                                <td colspan="4" class="loading"><i class="bi bi-arrow-clockwise"></i><br>Loading data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TEAM PERFORMANCE -->
            <div class="status-table-section">
                <h2 class="section-title">Team Performance</h2>
                <p class="section-subtitle">Individual Agent Performance & Activity</p>
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>AGENT NAME</th>
                                <th>TEAM</th>
                                <th>ASSIGNED</th>
                                <th>CALLS</th>
                                <th>CONNECTED</th>
                                <th>MEETINGS</th>
                                <th>QUALIFIED</th>
                                <th>CONVERSION</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="teamPerformanceBody">
                            <tr>
                                <td colspan="11" class="loading"><i class="bi bi-arrow-clockwise"></i><br>Loading
                                    data...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOLLOW-UPS & TASK MANAGEMENT -->
            <div class="status-table-section">
                <h2 class="section-title">Follow-ups & Task Management</h2>
                <p class="section-subtitle">Track all pending follow-ups and scheduled tasks</p>
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 50px;">
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>LEAD</th>
                                <th>TYPE</th>
                                <th>DUE DATE</th>
                                <th>LAST ACTION</th>
                                <th>OWNER</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="followUpTasksBody">
                            <tr>
                                <td colspan="8" class="loading"><i class="bi bi-arrow-clockwise"></i><br>Loading data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- COMPLETE LEAD DATABASE -->
            <div class="status-table-section">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="section-title">Complete Lead Database</h2>
                        <p class="section-subtitle">All leads with contact info, status, and quality metrics</p>
                    </div>
                    <div>
                        <button class="btn-filter btn-secondary"><i class="bi bi-funnel"></i> Filter</button>
                        <button class="btn-filter btn-primary"><i class="bi bi-download"></i> Export</button>
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 40px;">
                                    <input type="checkbox">
                                </th>
                                <th>LEAD</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>COMPANY</th>
                                <th>SOURCE</th>
                                <th>STATUS</th>
                                <th>OWNER</th>
                                <th>QUALITY</th>
                                <th>USE CASE</th>
                                <th>LAST ACTIVITY</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="leadDatabaseBody">
                            <tr>
                                <td colspan="12" class="loading"><i class="bi bi-arrow-clockwise"></i><br>Loading
                                    data...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const API_BASE_URL = 'leads-api.php';

        // Fetch and render dashboard data
        async function fetchDashboardData() {
            try {
                const response = await fetch(API_BASE_URL);
                const data = await response.json();

                renderStatusTable(data.statusDistribution);
                renderTeamPerformance(data.teamPerformance);
                renderFollowUpTasks(data.followUpTasks);
                renderLeadDatabase(data.leadDatabase);
                renderCharts(data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // Render Status Table
        function renderStatusTable(statusData) {
            const tbody = document.getElementById('statusTableBody');
            tbody.innerHTML = statusData.map((item, index) => {
                const statusClass = getStatusClass(item.status);
                const progressClass = getProgressClass(item.percentage);
                return `
                    <tr>
                        <td>${index + 1}</td>
                        <td><span class="status-badge ${statusClass}">${item.status}</span></td>
                        <td style="text-align: right; font-weight: 600;">${item.count}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div class="progress-bar-container" style="flex: 1;">
                                    <div class="progress-bar-fill ${progressClass}" style="width: ${item.percentage}%;"></div>
                                </div>
                                <span style="font-size: 13px; font-weight: 600; color: #475569; min-width: 45px;">${item.percentage}%</span>
                            </div>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Render Team Performance
        function renderTeamPerformance(teamData) {
            const tbody = document.getElementById('teamPerformanceBody');
            tbody.innerHTML = teamData.map((agent, index) => {
                const statusBadge = agent.conversion >= 5 ?
                    '<span class="status-badge status-meeting">Excellent</span>' :
                    '<span class="status-badge status-followup">Good</span>';
                return `
                    <tr>
                        <td>${index + 1}</td>
                        <td style="font-weight: 600;">${agent.name}</td>
                        <td><span class="team-badge ${agent.team === 'Inbound' ? 'badge-inbound' : 'badge-outbound'}" style="font-size: 11px; padding: 4px 10px;">${agent.team}</span></td>
                        <td>${agent.assigned}</td>
                        <td>${agent.calls}</td>
                        <td>${agent.connected}</td>
                        <td>${agent.meetings}</td>
                        <td>${agent.qualified}</td>
                        <td style="font-weight: 600; color: #10b981;">${agent.conversion}%</td>
                        <td>${statusBadge}</td>
                        <td>
                            <button class="action-btn" title="View"><i class="bi bi-eye"></i></button>
                            <button class="action-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                            <button class="action-btn" title="More"><i class="bi bi-three-dots-vertical"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Render Follow-up Tasks
        function renderFollowUpTasks(tasks) {
            const tbody = document.getElementById('followUpTasksBody');
            tbody.innerHTML = tasks.map((task, index) => {
                const dueClass = task.priority === 'High' ? 'status-badge status-invalid' : 'status-badge status-followup';
                return `
                    <tr>
                        <td><input type="checkbox"></td>
                        <td style="font-weight: 600;">${task.lead}</td>
                        <td><span class="${dueClass}" style="font-size: 11px;">${task.type}</span></td>
                        <td>${task.dueDate}</td>
                        <td style="font-size: 12px; color: #64748b;">${task.lastAction}</td>
                        <td>${task.owner}</td>
                        <td><span class="status-badge ${task.status === 'Due' ? 'status-invalid' : 'status-followup'}">${task.status}</span></td>
                        <td>
                            <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                            <button class="action-btn" title="Email"><i class="bi bi-envelope"></i></button>
                            <button class="action-btn" title="Complete"><i class="bi bi-check-circle"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Render Lead Database
        function renderLeadDatabase(leads) {
            const tbody = document.getElementById('leadDatabaseBody');
            tbody.innerHTML = leads.map((lead, index) => {
                const statusClass = getStatusClass(lead.status);
                return `
                    <tr>
                        <td><input type="checkbox"></td>
                        <td style="font-weight: 600;">${lead.name}</td>
                        <td style="font-size: 13px; color: #64748b;">${lead.email}</td>
                        <td style="font-size: 13px;">${lead.phone}</td>
                        <td>${lead.company}</td>
                        <td><span class="status-badge status-followup" style="font-size: 11px;">${lead.source}</span></td>
                        <td><span class="status-badge ${statusClass}">${lead.status}</span></td>
                        <td>${lead.owner}</td>
                        <td>
                            <span style="font-size: 12px; font-weight: 600; color: ${lead.quality === 'High' ? '#10b981' : '#f59e0b'};">
                                ${lead.quality}
                            </span>
                        </td>
                        <td style="font-size: 12px;">${lead.useCase}</td>
                        <td style="font-size: 12px; color: #64748b;">${lead.lastActivity}</td>
                        <td>
                            <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                            <button class="action-btn" title="Email"><i class="bi bi-envelope"></i></button>
                            <button class="action-btn" title="View"><i class="bi bi-eye"></i></button>
                            <button class="action-btn" title="More"><i class="bi bi-three-dots"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Render all charts
        function renderCharts(data) {
            // Inbound Funnel Chart
            new Chart(document.getElementById('inboundFunnelChart'), {
                type: 'bar',
                data: {
                    labels: ['Connected (Transfer To Sails)', 'Varified Account', 'Invalid No.'],
                    datasets: [{
                        label: 'Count',
                        data: [845, 773, 688],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { grid: { display: false } }
                    },
                    plugins: {
                        // ⭐ Bigger tooltip text
                        tooltip: {
                            bodyFont: {
                                size: 16,
                                weight: 'bold'
                            },
                            titleFont: {
                                size: 18,
                                weight: '700'
                            },
                            padding: 12
                        }
                    },
                }
            });

            // Inbound Status Pie Chart
            new Chart(document.getElementById('inboundStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Google Search', 'Live Chat', 'Import By Manoj', 'Google Adwords', 'Partners', 'Incoming Call', 'OutGoing Call', 'Marketing Emails', 'Events', 'Social Media', 'Email', 'My Database', 'Existing Database', 'Cloud Account', 'Enterprise Clients -CT', 'Tally Accounts', 'Landing Pages', 'ART Database', 'Forms', 'Partner Account'],
                    datasets: [{
                        data: [773, 612, 688, 98, 430, 23, 44, 55, 66, 77, 88, 99, 11, 2, 333, 444, 555, 666, 777, 888],
                        backgroundColor: ['#f59e0b', '#3b82f6', '#10b981', '#ef4444', '#6366f1']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' },
                        tooltip: {
                            bodyFont: {
                                size: 16,
                                weight: 'bold'
                            },
                            titleFont: {
                                size: 18,
                                weight: '700'
                            },
                            padding: 12,
                        }

                    }
                }
            });

            // Outbound Activity Chart
            new Chart(document.getElementById('outboundActivityChart'), {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        {
                            label: 'Calls',
                            data: [120, 150, 180, 140, 160, 90, 70],
                            backgroundColor: '#3b82f6'
                        },
                        {
                            label: 'Emails',
                            data: [200, 180, 220, 190, 210, 120, 100],
                            backgroundColor: '#10b981'
                        },
                        {
                            label: 'WhatsApp',
                            data: [80, 90, 100, 85, 95, 60, 50],
                            backgroundColor: '#f59e0b'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        // ⭐ Bigger tooltip text
                        tooltip: {
                            bodyFont: {
                                size: 16,
                                weight: 'bold'
                            },
                            titleFont: {
                                size: 18,
                                weight: '700'
                            },
                            padding: 12
                        }
                    },

                    scales: {
                        x: { grid: { display: false } },
                        y: { beginAtZero: true }
                    }
                }
            });

            const leadQualityCtx = document.getElementById('leadQualityChart').getContext('2d');

            new Chart(leadQualityCtx, {
                type: 'pie',
                data: {
                    labels: ['Excellent', 'Good', 'Fair'],
                    datasets: [{
                        data: [50, 10, 90],
                        backgroundColor: ['#10b981', '#3b82f6', '#f59e0b'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });


            // Conversion Trends Line Chart
            new Chart(document.getElementById('conversionTrendsChart'), {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [
                        {
                            label: 'Inbound',
                            data: [12, 15, 18, 22],
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Outbound',
                            data: [5, 7, 9, 11],
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { callback: value => value + '%' }
                        }
                    }
                }
            });

            // Use Case Distribution Chart
            new Chart(document.getElementById('useCaseChart'), {
                type: 'bar',
                data: {
                    labels: ['AWS', 'Azure', 'GCP', 'Linode', 'DigitalOcean', 'Hybrid', 'On-prem', 'Others'],
                    datasets: [{
                        label: 'Count',
                        data: [420, 380, 290, 250, 180, 200, 300, 350],
                        backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6', '#33294dff', '#e6249bff', '#60d133ff'],
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { display: false } }
                    }
                }
            });
            // ['< 10k', '10k-50k', '50k-1L', '1L-5L', '> 5L'],
            // Cloud Spend Chart
            new Chart(document.getElementById('cloudSpendChart'), {
                type: 'bar',
                data: {
                    labels: ['AWS', 'Azure', 'GCP', 'Linode', 'DigitalOcean', 'Hybrid', 'On-prem', 'Others'],
                    datasets: [{
                        label: 'Leads',
                        data: [420, 380, 290, 250, 180, 200, 8000, 350],
                        backgroundColor: '#10b981',
                        borderRadius: 6
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { grid: { display: false } }
                    }
                }
            });
        }

        // Helper functions
        function getStatusClass(status) {
            const statusMap = {
                'Not Called': 'status-not-called',
                'Invalid Number': 'status-invalid',
                'Called – No Answer': 'status-no-answer',
                'Called – Not Interested': 'status-not-interested',
                'Meeting Scheduled': 'status-meeting',
                'Follow-up Required': 'status-followup',
                'Do Not Call': 'status-dnc',
                'Callback Requested': 'status-callback',
                'No Longer at Company': 'status-no-longer',
                'Sent Information – Awaiting': 'status-sent-info',
                'In Lock-In': 'status-lock-in',
                'Wrong Details': 'status-wrong',
                'Disconnect': 'status-disconnect'
            };
            return statusMap[status] || 'status-not-called';
        }

        function getProgressClass(percentage) {
            if (percentage >= 15) return 'progress-red';
            if (percentage >= 10) return 'progress-orange';
            if (percentage >= 5) return 'progress-blue';
            return 'progress-green';
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', fetchDashboardData);
    </script>
</body>

</html>