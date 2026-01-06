<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing & Collections Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="billing_style.css">
    <style>
        
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include "../sidebar.php" ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header-section d-flex justify-content-between align-items-start">
            <div>
                <h2>Billing & Collections Dashboard</h2>
                <p class="subtitle mb-0">₹175M invoiced • ₹165M collected • 94.5% collection rate</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-download me-1"></i> Export
                </button>
                <button class="btn btn-primary btn-sm">
                    <i class="bi bi-eye me-1"></i> View All
                </button>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="d-flex gap-2 flex-wrap">
                <span class="badge bg-primary">7 days</span>
                <span class="badge bg-light text-dark">15 days</span>
                <span class="badge bg-light text-dark">30 days</span>
                <span class="badge bg-light text-dark">90 days</span>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Total Invoiced</div>
                    <div class="stat-value">₹52.8L</div>
                    <div class="stat-subtitle">+12.5% vs last month</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Total Collected</div>
                    <div class="stat-value">₹48.9L</div>
                    <div class="stat-subtitle">92.6% collection rate</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Pending Receivables</div>
                    <div class="stat-value">₹8.2L</div>
                    <div class="stat-subtitle">42 customers</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Overdue Amount</div>
                    <div class="stat-value text-danger">₹4.0L</div>
                    <div class="stat-subtitle">Avg 45 days overdue</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Refunds & Credits</div>
                    <div class="stat-value">₹2.1L</div>
                    <div class="stat-subtitle">4.3% refund rate</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Net Realized Revenue</div>
                    <div class="stat-value text-success">₹46.8L</div>
                    <div class="stat-subtitle">After refunds</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">GST Collected</div>
                    <div class="stat-value">₹9.5L</div>
                    <div class="stat-subtitle">18% of invoiced</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-label">Bad Debts</div>
                    <div class="stat-value">₹0.5L</div>
                    <div class="stat-subtitle">1.1% write-off</div>
                </div>
            </div>
        </div>

        <!-- Sales vs Collections -->
        <div class="chart-card mb-4">
            <h5>Sales vs Collections</h5>
            <canvas id="salesCollectionsChart" height="80"></canvas>
        </div>

        <!-- Overdue & Pending Receivables -->
        <h5 class="section-title">Overdue & Pending Receivables</h5>
        <div class="row g-4 mb-4">
            <div class="col-lg-5">
                <div class="chart-card">
                    <h5>Aging Buckets</h5>
                    <canvas id="agingChart" height="200"></canvas>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="chart-card">
                    <h5>Collection Efficiency</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-4">
                            <div class="text-center">
                                <div class="stat-value text-success">94.5%</div>
                                <div class="stat-label">Collection Rate</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="stat-value">23 days</div>
                                <div class="stat-label">Avg Collection Period</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <div class="stat-value">₹4.0L</div>
                                <div class="stat-label">Total Overdue</div>
                            </div>
                        </div>
                    </div>
                    <canvas id="collectionTrendChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <!-- Overdue Invoice Details -->
        <div class="table-card mb-4">
            <div class="table-card-header">
                <h5>Overdue Invoice Details</h5>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-filter me-1"></i> Filter
                    </button>
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice Date</th>
                            <th>Customer Name</th>
                            <th>Type</th>
                            <th>Invoice No.</th>
                            <th>Due Date</th>
                            <th class="text-end">Amount</th>
                            <th class="text-end">Paid</th>
                            <th class="text-end">Outstanding</th>
                            <th>Days</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="overdueTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Refunds & Credit Activity -->
        <h5 class="section-title">Refunds & Credit Activity</h5>
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="chart-card">
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <div class="stat-label">Total Refunds</div>
                            <div class="stat-value">₹2.1L</div>
                        </div>
                        <div class="col-6">
                            <div class="stat-label">Refund Count</div>
                            <div class="stat-value">27</div>
                        </div>
                    </div>
                    <div class="stat-label mb-2">Refund Rate</div>
                    <div class="progress" style="height: 24px;">
                        <div class="progress-bar bg-warning" style="width: 4.3%">4.3%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="chart-card">
                    <h5>Refund Amount by Reason</h5>
                    <canvas id="refundReasonsChart" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Shares, Refunds & Credits Table -->
        <div class="table-card mb-4">
            <div class="table-card-header">
                <h5>Shares, Refunds & Credits</h5>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-download me-1"></i> Export
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Invoice No.</th>
                            <th>Refund ID</th>
                            <th class="text-end">Amount</th>
                            <th>Reason</th>
                            <th>Processed By</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="refundTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- GST & Tax Treatment -->
        <h5 class="section-title">GST & Tax Treatment</h5>
        <div class="row g-3 mb-3">
            <div class="col-lg-4">
                <div class="gst-summary-card">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-building text-primary fs-3 me-3"></i>
                        <div>
                            <div class="stat-label">GST Registered (B2B)</div>
                            <div class="stat-value">₹32.5L</div>
                        </div>
                    </div>
                    <div class="small text-muted">156 invoices • GST: ₹5.85L</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gst-summary-card">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-person text-warning fs-3 me-3"></i>
                        <div>
                            <div class="stat-label">Unregistered (B2C)</div>
                            <div class="stat-value">₹14.8L</div>
                        </div>
                    </div>
                    <div class="small text-muted">89 invoices • GST: ₹2.66L</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gst-summary-card">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-globe text-info fs-3 me-3"></i>
                        <div>
                            <div class="stat-label">Overseas (Export)</div>
                            <div class="stat-value">₹5.5L</div>
                        </div>
                    </div>
                    <div class="small text-muted">34 invoices • GST: ₹0</div>
                </div>
            </div>
        </div>

        <!-- GST Breakdown Table -->
        <div class="table-card mb-4">
            <div class="table-card-header">
                <h5>GST Breakdown by Invoice</h5>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-download me-1"></i> Export GSTR Report
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice No.</th>
                            <th>Customer</th>
                            <th>Type</th>
                            <th>Place of Supply</th>
                            <th class="text-end">Taxable Value</th>
                            <th class="text-end">CGST</th>
                            <th class="text-end">SGST</th>
                            <th class="text-end">IGST</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody id="gstTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Customer Billing Health & Risk -->
        <h5 class="section-title">Customer Billing Health & Risk</h5>
        
        <!-- High Risk Alert -->
        <div class="high-risk-alert">
            <h6><i class="bi bi-exclamation-triangle-fill me-2"></i>High Risk Customers (2)</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="risk-customer-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="fw-semibold">StartupHub</div>
                                <div class="small text-muted">5 overdues • 4 refund requests</div>
                            </div>
                            <div class="text-end">
                                <div class="small text-muted">Avg Delay</div>
                                <div class="fw-bold text-danger">52 days</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-sm w-100">Review</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="risk-customer-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="fw-semibold">InnovateTech Ltd</div>
                                <div class="small text-muted">6 overdues • 3 refund requests</div>
                            </div>
                            <div class="text-end">
                                <div class="small text-muted">Avg Delay</div>
                                <div class="fw-bold text-danger">67 days</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-sm w-100">Review</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Billing Health Scorecard -->
        <div class="table-card mb-4">
            <div class="table-card-header">
                <h5>Customer Billing Health Scorecard</h5>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-download me-1"></i> Export
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th class="text-end">MRR / Avg Invoice</th>
                            <th class="text-center">Health Score</th>
                            <th class="text-end">Avg Payment Delay</th>
                            <th class="text-center">Total Overdues</th>
                            <th class="text-center">Refund Count</th>
                            <th>Risk Level</th>
                        </tr>
                    </thead>
                    <tbody id="healthTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product-wise Revenue Breakdown -->
        <div class="chart-card mb-4">
            <h5>Product-wise Revenue Breakdown</h5>
            <canvas id="productRevenueChart" height="80"></canvas>
        </div>

        <!-- Billing Operations & Ownership -->
        <h5 class="section-title">Billing Operations & Ownership</h5>
        <div class="table-card mb-4">
            <div class="table-card-header">
                <h5>Team Performance & Accountability</h5>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-download me-1"></i> Export
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Team Member</th>
                            <th class="text-center">Invoices</th>
                            <th class="text-end">Invoice Amount</th>
                            <th class="text-end">Collections</th>
                            <th class="text-center">Reminders</th>
                            <th class="text-center">Refunds</th>
                            <th class="text-center">Errors</th>
                            <th class="text-end">Avg Invoice Time</th>
                            <th class="text-end">Avg Payment Time</th>
                        </tr>
                    </thead>
                    <tbody id="teamTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Alerts & Exception Watchlist -->
        <h5 class="section-title">Alerts & Exception Watchlist</h5>
        <div class="row g-3 mb-4" id="alertsContainer">
            <!-- Populated by JS -->
        </div>
    </div>

    <script>
        // Fetch data from API
        fetch('billing-api.php')
            .then(response => response.json())
            .then(data => {
                populateOverdueTable(data.overdueDetails);
                populateRefundTable(data.refundDetails);
                populateGstTable(data.gstDetails);
                populateHealthTable(data.customerHealth);
                populateTeamTable(data.teamPerformance);
                populateAlerts(data.alerts);
                initCharts(data);
            });

        function populateOverdueTable(data) {
            const tbody = document.getElementById('overdueTableBody');
            tbody.innerHTML = data.map(item => `
                <tr>
                    <td>${item.invoiceDate}</td>
                    <td class="fw-medium">${item.customer}</td>
                    <td><span class="badge badge-${item.typeClass}">${item.type}</span></td>
                    <td><code class="small">${item.invoiceNo}</code></td>
                    <td>${item.dueDate}</td>
                    <td class="text-end">₹${item.amount}</td>
                    <td class="text-end text-success">₹${item.paid || '0'}</td>
                    <td class="text-end fw-semibold">₹${item.outstanding}</td>
                    <td class="text-danger fw-bold">${item.daysOverdue}</td>
                    <td><span class="badge badge-${item.statusClass}">${item.status}</span></td>
                </tr>
            `).join('');
        }

        function populateRefundTable(data) {
            const tbody = document.getElementById('refundTableBody');
            tbody.innerHTML = data.map(item => `
                <tr>
                    <td>${item.date}</td>
                    <td class="fw-medium">${item.customer}</td>
                    <td><code class="small">${item.invoiceNo}</code></td>
                    <td><code class="small">${item.refundId}</code></td>
                    <td class="text-end">₹${item.amount}</td>
                    <td>${item.reason}</td>
                    <td class="small text-muted">${item.processedBy}</td>
                    <td><span class="badge badge-${item.statusClass}">${item.status}</span></td>
                </tr>
            `).join('');
        }

        function populateGstTable(data) {
            const tbody = document.getElementById('gstTableBody');
            tbody.innerHTML = data.map(item => `
                <tr>
                    <td><code class="small">${item.invoiceNo}</code></td>
                    <td>${item.customer}</td>
                    <td><span class="badge badge-${item.typeClass}">${item.type}</span></td>
                    <td>${item.placeOfSupply}</td>
                    <td class="text-end">₹${item.taxableValue}</td>
                    <td class="text-end">${item.cgst !== '0' ? '₹' + item.cgst : '-'}</td>
                    <td class="text-end">${item.sgst !== '0' ? '₹' + item.sgst : '-'}</td>
                    <td class="text-end">${item.igst !== '0' ? '₹' + item.igst : '-'}</td>
                    <td><span class="badge bg-primary text-white">${item.category}</span></td>
                </tr>
            `).join('');
        }

        function populateHealthTable(data) {
            const tbody = document.getElementById('healthTableBody');
            tbody.innerHTML = data.map(item => {
                const scoreClass = item.healthScore >= 80 ? 'high' : item.healthScore >= 60 ? 'medium' : 'low';
                return `
                    <tr>
                        <td class="fw-medium">${item.name}</td>
                        <td class="text-end">₹${item.mrr}</td>
                        <td class="text-center">
                            <span class="health-score health-score-${scoreClass}">${item.healthScore}</span>
                        </td>
                        <td class="text-end">${item.avgDelay} days</td>
                        <td class="text-center">₹${item.totalOverdues}</td>
                        <td class="text-center"><span class="badge bg-secondary">${item.refundCount}</span></td>
                        <td><span class="badge badge-${item.riskClass}">${item.riskLevel}</span></td>
                    </tr>
                `;
            }).join('');
        }

        function populateTeamTable(data) {
            const tbody = document.getElementById('teamTableBody');
            tbody.innerHTML = data.map(item => `
                <tr>
                    <td class="fw-medium">${item.name}</td>
                    <td class="text-center"><span class="badge bg-secondary">${item.invoices}</span></td>
                    <td class="text-end">₹${item.amount}</td>
                    <td class="text-end text-success">₹${item.collections}</td>
                    <td class="text-center">${item.reminders}</td>
                    <td class="text-center"><span class="badge bg-light text-dark">${item.refunds}</span></td>
                    <td class="text-center"><span class="badge ${item.errors > 2 ? 'bg-danger' : 'bg-secondary'}">${item.errors}</span></td>
                    <td class="text-end">${item.invoiceTime} days</td>
                    <td class="text-end">${item.paymentTime} days</td>
                </tr>
            `).join('');
        }

        function populateAlerts(data) {
            const container = document.getElementById('alertsContainer');
            container.innerHTML = data.map(alert => `
                <div class="col-lg-6">
                    <div class="alert-card alert-${alert.severity.toLowerCase()}">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="alert-title">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                ${alert.title}
                            </div>
                            <span class="badge ${alert.severity === 'High' ? 'bg-danger' : alert.severity === 'Medium' ? 'bg-warning' : 'bg-info'}">${alert.severity}</span>
                        </div>
                        <div class="alert-description">${alert.description}</div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary btn-sm">${alert.action}</button>
                            <button class="btn btn-outline-secondary btn-sm">Dismiss</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function initCharts(data) {
            // Sales vs Collections Chart
            new Chart(document.getElementById('salesCollectionsChart'), {
                type: 'line',
                data: {
                    labels: data.salesVsCollection.labels,
                    datasets: [
                        {
                            label: 'Invoiced',
                            data: data.salesVsCollection.invoiced,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Collected',
                            data: data.salesVsCollection.collected,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Pending',
                            data: data.salesVsCollection.pending,
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => '₹' + value + 'L'
                            }
                        }
                    }
                }
            });

            // Aging Buckets Chart
            new Chart(document.getElementById('agingChart'), {
                type: 'bar',
                data: {
                    labels: data.agingBuckets.map(b => b.label),
                    datasets: [{
                        label: 'Amount',
                        data: data.agingBuckets.map(b => parseFloat(b.amount)),
                        backgroundColor: data.agingBuckets.map(b => b.color)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => '₹' + value + 'L'
                            }
                        }
                    }
                }
            });

            // Collection Trend Chart
            new Chart(document.getElementById('collectionTrendChart'), {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Collection %',
                        data: [92, 94, 91, 95],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 85,
                            max: 100,
                            ticks: {
                                callback: value => value + '%'
                            }
                        }
                    }
                }
            });

            // Refund Reasons Chart
            new Chart(document.getElementById('refundReasonsChart'), {
                type: 'bar',
                data: {
                    labels: data.refundMetrics.reasons.labels,
                    datasets: [{
                        axis: 'y',
                        label: 'Count',
                        data: data.refundMetrics.reasons.values,
                        backgroundColor: ['#ef4444', '#f59e0b', '#3b82f6', '#10b981', '#8b5cf6']
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Product Revenue Chart
            new Chart(document.getElementById('productRevenueChart'), {
                type: 'bar',
                data: {
                    labels: data.productRevenue.labels,
                    datasets: [
                        {
                            label: 'Invoiced',
                            data: data.productRevenue.invoiced,
                            backgroundColor: '#3b82f6'
                        },
                        {
                            label: 'Collected',
                            data: data.productRevenue.collected,
                            backgroundColor: '#10b981'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => '₹' + value + 'L'
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
