<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Operations Dashboard - Utho CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; background: #f8f9fa; }
        
        /* Top Header */
        .top-header { position: fixed; left: 240px; right: 0; top: 0; background: white; border-bottom: 1px solid #e5e7eb; padding: 12px 24px; z-index: 999; display: flex; justify-content: space-between; align-items: center; }
        .search-container { flex: 1; max-width: 400px; position: relative; }
        .search-container input { width: 100%; padding: 8px 12px 8px 36px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; }
        .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; }
        .header-actions { display: flex; align-items: center; gap: 16px; }
        .btn-export { background: #3b82f6; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; }
        .notification-bell { position: relative; width: 36px; height: 36px; border-radius: 8px; border: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .notification-badge { position: absolute; top: -4px; right: -4px; background: #ef4444; color: white; border-radius: 10px; padding: 2px 6px; font-size: 11px; font-weight: 600; }
        .user-menu { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .user-avatar { width: 36px; height: 36px; border-radius: 50%; background: #3b82f6; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; }
        
        /* Main Content */
        .main-content { margin-left: 240px; margin-top: 60px; padding: 24px; }
        
        /* Page Title */
        .page-title { font-size: 24px; font-weight: 700; color: #1f2937; margin-bottom: 24px; }
        
        /* Filter Bar */
        .filter-bar { background: white; border-radius: 12px; padding: 16px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }
        .filter-select { padding: 6px 12px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 13px; background: white; }
        .filter-btn { padding: 6px 12px; border: 1px solid #e5e7eb; background: white; border-radius: 6px; font-size: 13px; cursor: pointer; }
        
        /* View Tabs */
        .view-tabs { display: flex; gap: 8px; margin-bottom: 24px; }
        .view-tab { padding: 10px 20px; background: white; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; color: #6b7280; }
        .view-tab.active { background: #3b82f6; color: white; border-color: #3b82f6; }
        
        /* KPI Cards */
        .kpi-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 16px; margin-bottom: 24px; }
        .kpi-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .kpi-header { display: flex; justify-content: space-between; align-items: start; margin-bottom: 12px; }
        .kpi-label { font-size: 13px; color: #6b7280; font-weight: 500; }
        .kpi-icon { width: 40px; height: 40px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .kpi-icon.green { background: #dcfce7; }
        .kpi-icon.blue { background: #dbeafe; }
        .kpi-icon.pink { background: #fce7f3; }
        .kpi-icon.red { background: #fee2e2; }
        .kpi-icon.yellow { background: #fef3c7; }
        .kpi-value { font-size: 28px; font-weight: 700; color: #1f2937; margin-bottom: 4px; }
        .kpi-subtitle { font-size: 12px; color: #9ca3af; }
        
        /* Small KPI Grid */
        .small-kpi-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 16px; margin-bottom: 24px; }
        .small-kpi { background: white; border-radius: 10px; padding: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); text-align: center; }
        .small-kpi-value { font-size: 24px; font-weight: 700; color: #1f2937; }
        .small-kpi-label { font-size: 12px; color: #6b7280; margin-top: 4px; }
        
        /* Section Card */
        .section-card { background: white; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 24px; }
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .section-title { font-size: 16px; font-weight: 700; color: #1f2937; margin: 0; }
        
        /* Two Column */
        .two-col { display: grid; grid-template-columns: 492px 1fr; gap: 24px; margin-bottom: 24px; }
        
        /* Scorecard Grid */
        .scorecard-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 24px; }
        .scorecard { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 2px solid #e5e7eb; }
        .scorecard-header { text-align: center; margin-bottom: 16px; }
        .agent-name { font-size: 15px; font-weight: 600; color: #1f2937; }
        .agent-role { font-size: 12px; color: #9ca3af; }
        .score-gauge { width: 120px; height: 120px; margin: 16px auto; position: relative; }
        .score-value { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; }
        .score-number { font-size: 32px; font-weight: 700; color: #1f2937; display: block; }
        .score-max { font-size: 14px; color: #9ca3af; }
        .time-metrics { display: flex; flex-direction: column; gap: 12px; margin: 16px 0; }
        .time-metric { display: flex; justify-content: space-between; align-items: center; }
        .metric-label { font-size: 12px; color: #6b7280; }
        .metric-value { font-size: 13px; font-weight: 600; color: #1f2937; }
        .ticket-stats { display: flex; justify-content: space-around; padding: 12px 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; margin: 12px 0; }
        .stat-item { text-align: center; }
        .stat-value { font-size: 18px; font-weight: 700; color: #1f2937; }
        .stat-label { font-size: 11px; color: #9ca3af; margin-top: 2px; }
        .problem-signals { margin-top: 12px; }
        .signal-badge { display: inline-block; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 600; margin: 4px 2px; }
        .signal-red { background: #fee2e2; color: #991b1b; }
        .signal-yellow { background: #fef3c7; color: #92400e; }
        
        /* Table */
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table thead { background: #f9fafb; }
        .data-table th { padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #6b7280; border-bottom: 2px solid #e5e7eb; }
        .data-table td { padding: 12px; font-size: 13px; color: #1f2937; border-bottom: 1px solid #f3f4f6; }
        .data-table tbody tr:hover { background: #f9fafb; }
        
        /* Badge */
        .badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .badge-success { background: #dcfce7; color: #15803d; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-danger { background: #fee2e2; color: #dc2626; }
        .badge-info { background: #dbeafe; color: #1e40af; }
        .badge-gray { background: #f3f4f6; color: #6b7280; }
        
        /* SLA Indicators */
        .sla-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        .sla-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 8px; }
        .sla-label { font-size: 13px; color: #6b7280; margin-bottom: 8px; }
        .sla-bars { display: flex; gap: 4px; justify-content: center; align-items: flex-end; height: 60px; margin-bottom: 8px; }
        .sla-bar { width: 24px; border-radius: 4px 4px 0 0; }
        .sla-value { font-size: 18px; font-weight: 700; color: #1f2937; }
        
        /* Progress Bar */
        .progress-bar-container { width: 100%; height: 8px; background: #e5e7eb; border-radius: 4px; overflow: hidden; }
        .progress-bar-fill { height: 100%; transition: width 0.3s; }
        
        /* Three Column */
        .three-col { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        
        /* Responsive */
        @media (max-width: 1600px) {
            .kpi-grid { grid-template-columns: repeat(3, 1fr); }
            .scorecard-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 1200px) {
            .two-col, .three-col { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include "../sidebar.php" ?>

    <!-- Top Header -->
    <div class="top-header">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Search tickets, customers...">
        </div>
        <div class="header-actions">
            <button class="btn-export">Export</button>
            <div class="notification-bell">
                🔔
                <span class="notification-badge">3</span>
            </div>
            <div class="user-menu">
                <div class="user-avatar">LK</div>
                <div>
                    <div style="font-size: 13px; font-weight: 600; color: #1f2937;">Lalit Kumar</div>
                    <div style="font-size: 11px; color: #9ca3af;">Support Manager</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Support Operations Dashboard</h1>
        
        <!-- Filter Bar -->
        <div class="filter-bar">
            <button id="btnManager" class="btn btn-sm mr-2 btn-light">Manager View</button>
        <button id="btnAgent" class="btn btn-sm btn-primary">Agent View</button>
            <select class="filter-select">
                <option>View: Manager</option>
                <option>View: Agent</option>
            </select>
            <select class="filter-select">
                <option>Agent: All Agents</option>
            </select>
            <select class="filter-select">
                <option>Priority: All</option>
            </select>
            <select class="filter-select">
                <option>Status: All</option>
            </select>
            <select class="filter-select">
                <option>Queue: All</option>
            </select>
            <select class="filter-select">
                <option>SLA: All</option>
            </select>
            <select class="filter-select">
                <option>Customer: All</option>
            </select>
            <select class="filter-select">
                <option>Product: All</option>
            </select>
            <button class="filter-btn">Apply</button>
        </div>

        <!-- View Tabs -->
        <div class="view-tabs">
            
            <div class="view-tab active">📊 OVERVIEW - Last 24 Hours</div>
            <div class="view-tab">📈 SLA - Last 7 Days</div>
        </div>

        <!-- Main KPIs -->
        <div class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">Total Tickets</div>
                        <div class="kpi-value">152</div>
                        <div class="kpi-subtitle">All time</div>
                    </div>
                    <div class="kpi-icon green">📋</div>
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">Open Tickets</div>
                        <div class="kpi-value">76</div>
                        <div class="kpi-subtitle">Currently active</div>
                    </div>
                    <div class="kpi-icon blue">📂</div>
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">Avg First RT</div>
                        <div class="kpi-value">55m</div>
                        <div class="kpi-subtitle">Target: < 1h</div>
                    </div>
                    <div class="kpi-icon pink">⏱️</div>
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">Avg Total RT</div>
                        <div class="kpi-value">4.2h</div>
                        <div class="kpi-subtitle">Resolution time</div>
                    </div>
                    <div class="kpi-icon blue">⏰</div>
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">SLA Breaches</div>
                        <div class="kpi-value">127</div>
                        <div class="kpi-subtitle">Needs attention</div>
                    </div>
                    <div class="kpi-icon red">⚠️</div>
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-header">
                    <div>
                        <div class="kpi-label">Reopens</div>
                        <div class="kpi-value">5</div>
                        <div class="kpi-subtitle">Resolution quality</div>
                    </div>
                    <div class="kpi-icon yellow">🔄</div>
                </div>
            </div>
        </div>

        <!-- Small KPI Grid -->
        <div class="small-kpi-grid">
            <div class="small-kpi">
                <div class="small-kpi-value">18/hr</div>
                <div class="small-kpi-label">Avg tickets / hour</div>
            </div>
            <div class="small-kpi">
                <div class="small-kpi-value">92%</div>
                <div class="small-kpi-label">FRT Compliance</div>
            </div>
            <div class="small-kpi">
                <div class="small-kpi-value">4.6</div>
                <div class="small-kpi-label">CSAT Score</div>
            </div>
            <div class="small-kpi">
                <div class="small-kpi-value">3.2%</div>
                <div class="small-kpi-label">Reopen Rate</div>
            </div>
            <div class="small-kpi">
                <div class="small-kpi-value">5</div>
                <div class="small-kpi-label">Unassigned</div>
            </div>
            <div class="small-kpi">
                <div class="small-kpi-value">89%</div>
                <div class="small-kpi-label">1st Contact Res</div>
            </div>
        </div>

        <!-- Ticket Status & SLA Performance -->
        <div class="two-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Ticket Status Overview</h3>
                </div>
                <canvas id="statusChart" style="max-height: 250px;"></canvas>
                <div style="margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="font-size: 13px; color: #6b7280;">● New (12)</span>
                        <span style="font-size: 13px; color: #6b7280;">● In Progress (34)</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="font-size: 13px; color: #6b7280;">● Waiting Customer (18)</span>
                        <span style="font-size: 13px; color: #6b7280;">● Resolved (76)</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="font-size: 13px; color: #6b7280;">● Closed (8)</span>
                        <span style="font-size: 13px; color: #6b7280;">● Reopened (4)</span>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Agent Pro SLA Performance</h3>
                </div>
                <div class="sla-grid">
                    <div class="sla-item">
                        <div class="sla-label">Critical</div>
                        <div class="sla-bars">
                            <div class="sla-bar" style="background: #15803d; height: 80%;"></div>
                            <div class="sla-bar" style="background: #eab308; height: 40%;"></div>
                            <div class="sla-bar" style="background: #dc2626; height: 20%;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-around; font-size: 11px; color: #9ca3af; margin-bottom: 8px;">
                            <span>8</span>
                            <span>2</span>
                            <span>1</span>
                        </div>
                        <div class="sla-value">11 Total</div>
                    </div>
                    <div class="sla-item">
                        <div class="sla-label">High</div>
                        <div class="sla-bars">
                            <div class="sla-bar" style="background: #15803d; height: 75%;"></div>
                            <div class="sla-bar" style="background: #eab308; height: 50%;"></div>
                            <div class="sla-bar" style="background: #dc2626; height: 30%;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-around; font-size: 11px; color: #9ca3af; margin-bottom: 8px;">
                            <span>24</span>
                            <span>5</span>
                            <span>3</span>
                        </div>
                        <div class="sla-value">32 Total</div>
                    </div>
                    <div class="sla-item">
                        <div class="sla-label">Medium</div>
                        <div class="sla-bars">
                            <div class="sla-bar" style="background: #15803d; height: 80%;"></div>
                            <div class="sla-bar" style="background: #eab308; height: 45%;"></div>
                            <div class="sla-bar" style="background: #dc2626; height: 25%;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-around; font-size: 11px; color: #9ca3af; margin-bottom: 8px;">
                            <span>38</span>
                            <span>7</span>
                            <span>4</span>
                        </div>
                        <div class="sla-value">49 Total</div>
                    </div>
                    <div class="sla-item">
                        <div class="sla-label">Low</div>
                        <div class="sla-bars">
                            <div class="sla-bar" style="background: #15803d; height: 85%;"></div>
                            <div class="sla-bar" style="background: #eab308; height: 30%;"></div>
                            <div class="sla-bar" style="background: #dc2626; height: 15%;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-around; font-size: 11px; color: #9ca3af; margin-bottom: 8px;">
                            <span>52</span>
                            <span>3</span>
                            <span>1</span>
                        </div>
                        <div class="sla-value">56 Total</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; gap: 24px; margin-top: 16px; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 12px; height: 12px; background: #15803d; border-radius: 3px;"></div>
                        <span style="font-size: 12px; color: #6b7280;">Within SLA</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 12px; height: 12px; background: #eab308; border-radius: 3px;"></div>
                        <span style="font-size: 12px; color: #6b7280;">At Risk</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 12px; height: 12px; background: #dc2626; border-radius: 3px;"></div>
                        <span style="font-size: 12px; color: #6b7280;">Breached</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agent Performance Scorecards -->
        <div class="section-card" style="background: #f9fafb;">
            <div class="section-header">
                <h3 class="section-title">🎯 Agent Performance Scorecards</h3>
            </div>
            <div class="scorecard-grid">
                <!-- Agent 1 -->
                <div class="scorecard">
                    <div class="scorecard-header">
                        <div class="agent-name">Rajesh K</div>
                        <div class="agent-role">L2 Support</div>
                    </div>
                    <div class="score-gauge">
                        <canvas id="gauge1" width="120" height="120"></canvas>
                        <div class="score-value">
                            <span class="score-number">92</span>
                            <span class="score-max">/100</span>
                        </div>
                    </div>
                    <div class="time-metrics">
                        <div class="time-metric">
                            <span class="metric-label">Avg Allocation Time</span>
                            <span class="metric-value">2m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg First Response Time</span>
                            <span class="metric-value">6m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg Resolution Time</span>
                            <span class="metric-value">2.1h</span>
                        </div>
                    </div>
                    <div class="ticket-stats">
                        <div class="stat-item">
                            <div class="stat-value">12</div>
                            <div class="stat-label">Open</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">45</div>
                            <div class="stat-label">Resolved</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">2</div>
                            <div class="stat-label">Reopened</div>
                        </div>
                    </div>
                    <div class="problem-signals">
                        <div style="font-size: 11px; color: #15803d; font-weight: 600;">✓ Excellent performance</div>
                    </div>
                </div>

                <!-- Agent 2 -->
                <div class="scorecard">
                    <div class="scorecard-header">
                        <div class="agent-name">Priya S</div>
                        <div class="agent-role">L1 Support</div>
                    </div>
                    <div class="score-gauge">
                        <canvas id="gauge2" width="120" height="120"></canvas>
                        <div class="score-value">
                            <span class="score-number">72</span>
                            <span class="score-max">/100</span>
                        </div>
                    </div>
                    <div class="time-metrics">
                        <div class="time-metric">
                            <span class="metric-label">Avg Allocation Time</span>
                            <span class="metric-value">5m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg First Response Time</span>
                            <span class="metric-value">12m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg Resolution Time</span>
                            <span class="metric-value">3.2h</span>
                        </div>
                    </div>
                    <div class="ticket-stats">
                        <div class="stat-item">
                            <div class="stat-value">18</div>
                            <div class="stat-label">Open</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">38</div>
                            <div class="stat-label">Resolved</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">5</div>
                            <div class="stat-label">Reopened</div>
                        </div>
                    </div>
                    <div class="problem-signals">
                        <span class="signal-badge signal-yellow">Slow first response</span>
                    </div>
                </div>

                <!-- Agent 3 -->
                <div class="scorecard">
                    <div class="scorecard-header">
                        <div class="agent-name">Amit P</div>
                        <div class="agent-role">L1 Support</div>
                    </div>
                    <div class="score-gauge">
                        <canvas id="gauge3" width="120" height="120"></canvas>
                        <div class="score-value">
                            <span class="score-number">55</span>
                            <span class="score-max">/100</span>
                        </div>
                    </div>
                    <div class="time-metrics">
                        <div class="time-metric">
                            <span class="metric-label">Avg Allocation Time</span>
                            <span class="metric-value">8m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg First Response Time</span>
                            <span class="metric-value">18m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg Resolution Time</span>
                            <span class="metric-value">4.8h</span>
                        </div>
                    </div>
                    <div class="ticket-stats">
                        <div class="stat-item">
                            <div class="stat-value">22</div>
                            <div class="stat-label">Open</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">28</div>
                            <div class="stat-label">Resolved</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">8</div>
                            <div class="stat-label">Reopened</div>
                        </div>
                    </div>
                    <div class="problem-signals">
                        <span class="signal-badge signal-red">High reopen rate</span>
                        <span class="signal-badge signal-red">Needs coaching</span>
                    </div>
                </div>

                <!-- Agent 4 -->
                <div class="scorecard">
                    <div class="scorecard-header">
                        <div class="agent-name">Sneha V</div>
                        <div class="agent-role">L2 Support</div>
                    </div>
                    <div class="score-gauge">
                        <canvas id="gauge4" width="120" height="120"></canvas>
                        <div class="score-value">
                            <span class="score-number">85</span>
                            <span class="score-max">/100</span>
                        </div>
                    </div>
                    <div class="time-metrics">
                        <div class="time-metric">
                            <span class="metric-label">Avg Allocation Time</span>
                            <span class="metric-value">3m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg First Response Time</span>
                            <span class="metric-value">7m</span>
                        </div>
                        <div class="time-metric">
                            <span class="metric-label">Avg Resolution Time</span>
                            <span class="metric-value">2.3h</span>
                        </div>
                    </div>
                    <div class="ticket-stats">
                        <div class="stat-item">
                            <div class="stat-value">14</div>
                            <div class="stat-label">Open</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">42</div>
                            <div class="stat-label">Resolved</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">3</div>
                            <div class="stat-label">Reopened</div>
                        </div>
                    </div>
                    <div class="problem-signals">
                        <div style="font-size: 11px; color: #15803d; font-weight: 600;">✓ Strong performer</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Comparison -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">Agent Pro Performance Comparison</h3>
            </div>
            <canvas id="scatterChart" style="max-height: 300px;"></canvas>
        </div>

        <!-- Team Performance Table -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">Team Performance & Workload</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Agent</th>
                        <th>Role</th>
                        <th>Open</th>
                        <th>Resolved</th>
                        <th>Reopened</th>
                        <th>Reopen %</th>
                        <th>Avg FRT</th>
                        <th>Avg RT</th>
                        <th>SLA Breach</th>
                        <th>CSAT</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rajesh Kumar</td>
                        <td>L2</td>
                        <td>12</td>
                        <td>45</td>
                        <td>2</td>
                        <td>4.4%</td>
                        <td>6 min</td>
                        <td>2.1 hrs</td>
                        <td><span class="badge badge-success">1</span></td>
                        <td>4.7/5</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Priya Sharma</td>
                        <td>L1</td>
                        <td>18</td>
                        <td>38</td>
                        <td>5</td>
                        <td>13.2%</td>
                        <td>12 min</td>
                        <td>3.2 hrs</td>
                        <td><span class="badge badge-warning">4</span></td>
                        <td>4.3/5</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Amit Patel</td>
                        <td>L1</td>
                        <td>22</td>
                        <td>28</td>
                        <td>8</td>
                        <td>28.6%</td>
                        <td>18 min</td>
                        <td>4.8 hrs</td>
                        <td><span class="badge badge-danger">7</span></td>
                        <td>3.9/5</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Sneha Verma</td>
                        <td>L2</td>
                        <td>14</td>
                        <td>42</td>
                        <td>3</td>
                        <td>7.1%</td>
                        <td>7 min</td>
                        <td>2.3 hrs</td>
                        <td><span class="badge badge-success">2</span></td>
                        <td>4.6/5</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Vikram Singh</td>
                        <td>L1</td>
                        <td>9</td>
                        <td>35</td>
                        <td>4</td>
                        <td>11.4%</td>
                        <td>10 min</td>
                        <td>2.9 hrs</td>
                        <td><span class="badge badge-warning">3</span></td>
                        <td>4.4/5</td>
                        <td><span class="badge badge-gray">On Leave</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Reopen Analysis & Most Reopened -->
        <div class="two-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Reopen Reason Breakdown</h3>
                </div>
                <canvas id="reopenChart" style="max-height: 250px;"></canvas>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Most Reopened Tickets</h3>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Customer</th>
                            <th>Count</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TKT-10189</td>
                            <td>TechCorp Solutions</td>
                            <td><span class="badge badge-danger">3x</span></td>
                            <td><span class="badge badge-danger">Critical</span></td>
                        </tr>
                        <tr>
                            <td>TKT-10201</td>
                            <td>CloudFast Inc</td>
                            <td><span class="badge badge-warning">2x</span></td>
                            <td><span class="badge badge-info">Open</span></td>
                        </tr>
                        <tr>
                            <td>TKT-10215</td>
                            <td>DataSys Ltd</td>
                            <td><span class="badge badge-warning">2x</span></td>
                            <td><span class="badge badge-info">Open</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Resolved Tickets Detail -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">Resolved Tickets Detail</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Customer</th>
                        <th>Subject</th>
                        <th>Priority</th>
                        <th>Resolved By</th>
                        <th>Resolution Time</th>
                        <th>CSAT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TKT-10236</td>
                        <td>DataSys Ltd</td>
                        <td>Billing inquiry</td>
                        <td><span class="badge badge-info">Low</span></td>
                        <td>Amit Patel</td>
                        <td>3.5h</td>
                        <td><span class="badge badge-success">5/5</span></td>
                    </tr>
                    <tr>
                        <td>TKT-10241</td>
                        <td>SecureCloud Inc</td>
                        <td>SSL certificate expiring</td>
                        <td><span class="badge badge-warning">Medium</span></td>
                        <td>Sneha Verma</td>
                        <td>2.3h</td>
                        <td><span class="badge badge-success">4/5</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- SLA & Time Trends -->
        <div class="three-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title" style="font-size: 14px;">SLA & First Pro (missed)</h3>
                </div>
                <div style="text-align: center; margin: 20px 0;">
                    <div style="font-size: 36px; font-weight: 700; color: #1f2937;">12</div>
                    <div style="font-size: 13px; color: #6b7280;">Missed SLA</div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title" style="font-size: 14px;">First Response Time Trend</h3>
                </div>
                <canvas id="frtChart" style="max-height: 150px;"></canvas>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title" style="font-size: 14px;">Resolution Time Trend</h3>
                </div>
                <canvas id="resolutionChart" style="max-height: 150px;"></canvas>
            </div>
        </div>

        <!-- Compliance & Waiting Time -->
        <div class="two-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">% At Compliance %</h3>
                </div>
                <canvas id="complianceChart" style="max-height: 250px;"></canvas>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Waiting Time</h3>
                </div>
                <canvas id="waitingChart" style="max-height: 250px;"></canvas>
            </div>
        </div>

        <!-- Shift Handover -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">Shift Handover & Ownership Tracker</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Current Owner</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Next Action</th>
                        <th>Handover Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TKT-10245</td>
                        <td>Priya Sharma</td>
                        <td><span class="badge badge-info">In Progress</span></td>
                        <td><span class="badge badge-warning">High</span></td>
                        <td>Follow up with DevOps</td>
                        <td>Waiting for DB restoration confirmation</td>
                    </tr>
                    <tr>
                        <td>TKT-10246</td>
                        <td>Amit Patel</td>
                        <td><span class="badge badge-gray">Pending Customer</span></td>
                        <td><span class="badge badge-warning">Medium</span></td>
                        <td>Customer to provide logs</td>
                        <td>Sent instructions via email</td>
                    </tr>
                    <tr>
                        <td>TKT-10247</td>
                        <td>Rajesh Kumar</td>
                        <td><span class="badge badge-info">In Progress</span></td>
                        <td><span class="badge badge-danger">Critical</span></td>
                        <td>Deploy hotfix</td>
                        <td>Patch ready, needs approval</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Support Tickets & Escalations -->
        <div class="two-col">
            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Support Tickets & Escalations</h3>
                </div>
                <canvas id="escalationChart" style="max-height: 250px;"></canvas>
                <div style="margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="font-size: 13px; color: #6b7280;">● Low (45)</span>
                        <span style="font-size: 13px; color: #6b7280;">● Medium (32)</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="font-size: 13px; color: #6b7280;">● High (18)</span>
                        <span style="font-size: 13px; color: #6b7280;">● Critical (8)</span>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">
                    <h3 class="section-title">Critical & High Priority Tickets</h3>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Customer</th>
                            <th>Priority</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TKT-10234<br><small style="color: #9ca3af;">VM instance not starting</small></td>
                            <td>TechCorp</td>
                            <td><span class="badge badge-danger">Critical</span></td>
                            <td>2h 15m</td>
                        </tr>
                        <tr>
                            <td>TKT-10235<br><small style="color: #9ca3af;">Database timeout errors</small></td>
                            <td>CloudFast</td>
                            <td><span class="badge badge-danger">Critical</span></td>
                            <td>1h 45m</td>
                        </tr>
                        <tr>
                            <td>TKT-10237<br><small style="color: #9ca3af;">K8s cluster scale-up issue</small></td>
                            <td>TechFlow</td>
                            <td><span class="badge badge-warning">High</span></td>
                            <td>4h</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Complete Ticket Database -->
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">Complete Ticket Database</h3>
                <button class="btn-export">Export All</button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Subject</th>
                        <th>Customer</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>SLA State</th>
                        <th>Agent</th>
                        <th>Queue</th>
                        <th>Created</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TKT-10234</td>
                        <td>VM instance not starting after reboot</td>
                        <td>TechCorp Solutions</td>
                        <td><span class="badge badge-warning">High</span></td>
                        <td><span class="badge badge-info">In Progress</span></td>
                        <td><span class="badge badge-success">Within SLA</span></td>
                        <td>Rajesh Kumar</td>
                        <td>Technical</td>
                        <td>2024-03-15 10:30</td>
                        <td>2h 15m</td>
                    </tr>
                    <tr>
                        <td>TKT-10235</td>
                        <td>Database connection timeout errors</td>
                        <td>CloudFast Inc</td>
                        <td><span class="badge badge-danger">Critical</span></td>
                        <td><span class="badge badge-gray">New</span></td>
                        <td><span class="badge badge-warning">At Risk</span></td>
                        <td>Priya Sharma</td>
                        <td>Technical</td>
                        <td>2024-03-15 11:00</td>
                        <td>1h 45m</td>
                    </tr>
                    <tr>
                        <td>TKT-10236</td>
                        <td>Billing inquiry - invoice discrepancy</td>
                        <td>DataSys Ltd</td>
                        <td><span class="badge badge-info">Low</span></td>
                        <td><span class="badge badge-success">Resolved</span></td>
                        <td><span class="badge badge-success">Within SLA</span></td>
                        <td>Amit Patel</td>
                        <td>Billing</td>
                        <td>2024-03-15 09:15</td>
                        <td>3h 30m</td>
                    </tr>
                    <tr>
                        <td>TKT-10237</td>
                        <td>Kubernetes cluster scale-up not working</td>
                        <td>TechFlow Systems</td>
                        <td><span class="badge badge-warning">High</span></td>
                        <td><span class="badge badge-info">In Progress</span></td>
                        <td><span class="badge badge-success">Within SLA</span></td>
                        <td>Sneha Verma</td>
                        <td>Technical</td>
                        <td>2024-03-15 08:45</td>
                        <td>4h</td>
                    </tr>
                    <tr>
                        <td>TKT-10238</td>
                        <td>Storage volume full - need expansion</td>
                        <td>CloudBase Ltd</td>
                        <td><span class="badge badge-warning">Medium</span></td>
                        <td><span class="badge badge-gray">Pending Customer</span></td>
                        <td><span class="badge badge-success">Within SLA</span></td>
                        <td>Rajesh Kumar</td>
                        <td>Technical</td>
                        <td>2024-03-14 16:20</td>
                        <td>20h 25m</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Initialize all charts
        function initCharts() {
            // Status Chart
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['New', 'In Progress', 'Waiting Customer', 'Resolved', 'Closed', 'Reopened'],
                    datasets: [{
                        data: [12, 34, 18, 76, 8, 4],
                        backgroundColor: ['#3b82f6', '#6366f1', '#8b5cf6', '#15803d', '#6b7280', '#dc2626'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    cutout: '65%'
                }
            });

            // Reopen Reason Chart
            const reopenCtx = document.getElementById('reopenChart').getContext('2d');
            new Chart(reopenCtx, {
                type: 'bar',
                data: {
                    labels: ['Incomplete Fix', 'Root Cause', 'Bad Comm', 'Customer', 'Alert'],
                    datasets: [{
                        label: 'Reopens',
                        data: [5, 3, 2, 1, 1],
                        backgroundColor: '#ef4444',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1 }
                        }
                    }
                }
            });

            // Scatter Chart
            const scatterCtx = document.getElementById('scatterChart').getContext('2d');
            new Chart(scatterCtx, {
                type: 'scatter',
                data: {
                    datasets: [
                        {
                            label: 'Rajesh K',
                            data: [{ x: 92, y: 2.1 }],
                            backgroundColor: '#15803d',
                            pointRadius: 8
                        },
                        {
                            label: 'Priya S',
                            data: [{ x: 72, y: 3.2 }],
                            backgroundColor: '#eab308',
                            pointRadius: 8
                        },
                        {
                            label: 'Amit P',
                            data: [{ x: 55, y: 4.8 }],
                            backgroundColor: '#dc2626',
                            pointRadius: 8
                        },
                        {
                            label: 'Sneha V',
                            data: [{ x: 85, y: 2.3 }],
                            backgroundColor: '#3b82f6',
                            pointRadius: 8
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        x: {
                            title: { display: true, text: 'Performance Score' },
                            min: 0,
                            max: 100
                        },
                        y: {
                            title: { display: true, text: 'Avg Resolution Time (hrs)' },
                            min: 0,
                            max: 6
                        }
                    }
                }
            });

            // FRT Trend
            const frtCtx = document.getElementById('frtChart').getContext('2d');
            new Chart(frtCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'FRT',
                        data: [10, 9, 8, 7, 8, 9, 7],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + ' min';
                                }
                            }
                        }
                    }
                }
            });

            // Resolution Trend
            const resolutionCtx = document.getElementById('resolutionChart').getContext('2d');
            new Chart(resolutionCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Resolution Time',
                        data: [3.2, 2.9, 2.7, 2.5, 2.4, 2.6, 2.3],
                        borderColor: '#15803d',
                        backgroundColor: 'rgba(21, 128, 61, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + ' hrs';
                                }
                            }
                        }
                    }
                }
            });

            // Compliance Chart
            const complianceCtx = document.getElementById('complianceChart').getContext('2d');
            new Chart(complianceCtx, {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'SLA Compliance %',
                        data: [92, 93, 94, 95],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    }
                }
            });

            // Waiting Time Chart
            const waitingCtx = document.getElementById('waitingChart').getContext('2d');
            new Chart(waitingCtx, {
                type: 'line',
                data: {
                    labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '24:00'],
                    datasets: [{
                        label: 'Avg Waiting Time',
                        data: [45, 38, 55, 62, 48, 40, 35],
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245, 158, 11, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + ' min';
                                }
                            }
                        }
                    }
                }
            });

            // Escalation Chart
            const escalationCtx = document.getElementById('escalationChart').getContext('2d');
            new Chart(escalationCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Low', 'Medium', 'High', 'Critical'],
                    datasets: [{
                        data: [45, 32, 18, 8],
                        backgroundColor: ['#3b82f6', '#eab308', '#f97316', '#dc2626'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    cutout: '65%'
                }
            });

            // Score Gauges
            drawGauge('gauge1', 92, '#15803d');
            drawGauge('gauge2', 72, '#eab308');
            drawGauge('gauge3', 55, '#dc2626');
            drawGauge('gauge4', 85, '#3b82f6');
        }

        function drawGauge(canvasId, score, color) {
            const canvas = document.getElementById(canvasId);
            const ctx = canvas.getContext('2d');
            const centerX = 60;
            const centerY = 60;
            const radius = 50;
            
            // Background circle
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
            ctx.lineWidth = 10;
            ctx.strokeStyle = '#e5e7eb';
            ctx.stroke();
            
            // Progress arc
            const startAngle = -Math.PI / 2;
            const endAngle = startAngle + (2 * Math.PI * score / 100);
            
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.lineWidth = 10;
            ctx.strokeStyle = color;
            ctx.stroke();
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', initCharts);
    </script>
</body>
</html>