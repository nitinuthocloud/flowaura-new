<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$view = isset($_GET['view']) ? $_GET['view'] : 'manager';

function generateSupportData($view) {
    $data = [
        'kpis' => [
            ['label' => 'Total Tickets', 'value' => '152', 'subtitle' => 'All time'],
            ['label' => 'Open Tickets', 'value' => '76', 'subtitle' => 'Currently active'],
            ['label' => 'Avg First RT', 'value' => '55m', 'subtitle' => 'Target: < 1h'],
            ['label' => 'Avg Total RT', 'value' => '4.2h', 'subtitle' => 'Resolution time'],
            ['label' => 'SLA Breaches', 'value' => '127', 'subtitle' => 'Needs attention'],
            ['label' => 'Reopens', 'value' => '5', 'subtitle' => 'Resolution quality']
        ],
        'smallKPIs' => [
            ['label' => 'Avg tickets / hour', 'value' => '18/hr'],
            ['label' => 'FRT Compliance', 'value' => '92%'],
            ['label' => 'CSAT Score', 'value' => '4.6'],
            ['label' => 'Reopen Rate', 'value' => '3.2%'],
            ['label' => 'Unassigned', 'value' => '5'],
            ['label' => '1st Contact Res', 'value' => '89%']
        ],
        'statusDistribution' => [
            'labels' => ['New', 'In Progress', 'Waiting Customer', 'Resolved', 'Closed', 'Reopened'],
            'values' => [12, 34, 18, 76, 8, 4]
        ],
        'slaPerformance' => [
            'critical' => ['withinSLA' => 8, 'atRisk' => 2, 'breached' => 1, 'total' => 11],
            'high' => ['withinSLA' => 24, 'atRisk' => 5, 'breached' => 3, 'total' => 32],
            'medium' => ['withinSLA' => 38, 'atRisk' => 7, 'breached' => 4, 'total' => 49],
            'low' => ['withinSLA' => 52, 'atRisk' => 3, 'breached' => 1, 'total' => 56]
        ],
        'agentScorecards' => [
            [
                'name' => 'Rajesh K',
                'role' => 'L2 Support',
                'score' => 92,
                'avgAllocation' => '2m',
                'avgFRT' => '6m',
                'avgResolution' => '2.1h',
                'open' => 12,
                'resolved' => 45,
                'reopened' => 2,
                'signal' => 'Excellent performance'
            ],
            [
                'name' => 'Priya S',
                'role' => 'L1 Support',
                'score' => 72,
                'avgAllocation' => '5m',
                'avgFRT' => '12m',
                'avgResolution' => '3.2h',
                'open' => 18,
                'resolved' => 38,
                'reopened' => 5,
                'signal' => 'Slow first response'
            ],
            [
                'name' => 'Amit P',
                'role' => 'L1 Support',
                'score' => 55,
                'avgAllocation' => '8m',
                'avgFRT' => '18m',
                'avgResolution' => '4.8h',
                'open' => 22,
                'resolved' => 28,
                'reopened' => 8,
                'signal' => 'High reopen rate, Needs coaching'
            ],
            [
                'name' => 'Sneha V',
                'role' => 'L2 Support',
                'score' => 85,
                'avgAllocation' => '3m',
                'avgFRT' => '7m',
                'avgResolution' => '2.3h',
                'open' => 14,
                'resolved' => 42,
                'reopened' => 3,
                'signal' => 'Strong performer'
            ]
        ],
        'teamPerformance' => [
            ['name' => 'Rajesh Kumar', 'role' => 'L2', 'open' => 12, 'resolved' => 45, 'reopened' => 2, 'reopenRate' => 4.4, 'avgFRT' => '6 min', 'avgRT' => '2.1 hrs', 'slaBreaches' => 1, 'csat' => '4.7/5', 'status' => 'Active'],
            ['name' => 'Priya Sharma', 'role' => 'L1', 'open' => 18, 'resolved' => 38, 'reopened' => 5, 'reopenRate' => 13.2, 'avgFRT' => '12 min', 'avgRT' => '3.2 hrs', 'slaBreaches' => 4, 'csat' => '4.3/5', 'status' => 'Active'],
            ['name' => 'Amit Patel', 'role' => 'L1', 'open' => 22, 'resolved' => 28, 'reopened' => 8, 'reopenRate' => 28.6, 'avgFRT' => '18 min', 'avgRT' => '4.8 hrs', 'slaBreaches' => 7, 'csat' => '3.9/5', 'status' => 'Active'],
            ['name' => 'Sneha Verma', 'role' => 'L2', 'open' => 14, 'resolved' => 42, 'reopened' => 3, 'reopenRate' => 7.1, 'avgFRT' => '7 min', 'avgRT' => '2.3 hrs', 'slaBreaches' => 2, 'csat' => '4.6/5', 'status' => 'Active'],
            ['name' => 'Vikram Singh', 'role' => 'L1', 'open' => 9, 'resolved' => 35, 'reopened' => 4, 'reopenRate' => 11.4, 'avgFRT' => '10 min', 'avgRT' => '2.9 hrs', 'slaBreaches' => 3, 'csat' => '4.4/5', 'status' => 'On Leave']
        ],
        'reopenAnalysis' => [
            'labels' => ['Incomplete Fix', 'Root Cause', 'Bad Comm', 'Customer', 'Alert'],
            'values' => [5, 3, 2, 1, 1]
        ],
        'mostReopened' => [
            ['ticketId' => 'TKT-10189', 'customer' => 'TechCorp Solutions', 'count' => 3, 'status' => 'Critical'],
            ['ticketId' => 'TKT-10201', 'customer' => 'CloudFast Inc', 'count' => 2, 'status' => 'Open'],
            ['ticketId' => 'TKT-10215', 'customer' => 'DataSys Ltd', 'count' => 2, 'status' => 'Open']
        ],
        'resolvedTickets' => [
            ['ticketId' => 'TKT-10236', 'customer' => 'DataSys Ltd', 'subject' => 'Billing inquiry', 'priority' => 'Low', 'resolvedBy' => 'Amit Patel', 'resolutionTime' => '3.5h', 'csat' => '5/5'],
            ['ticketId' => 'TKT-10241', 'customer' => 'SecureCloud Inc', 'subject' => 'SSL certificate expiring', 'priority' => 'Medium', 'resolvedBy' => 'Sneha Verma', 'resolutionTime' => '2.3h', 'csat' => '4/5']
        ],
        'trends' => [
            'frt' => [10, 9, 8, 7, 8, 9, 7],
            'resolution' => [3.2, 2.9, 2.7, 2.5, 2.4, 2.6, 2.3],
            'compliance' => [92, 93, 94, 95],
            'waiting' => [45, 38, 55, 62, 48, 40, 35]
        ],
        'handover' => [
            ['ticketId' => 'TKT-10245', 'owner' => 'Priya Sharma', 'status' => 'In Progress', 'priority' => 'High', 'nextAction' => 'Follow up with DevOps', 'notes' => 'Waiting for DB restoration confirmation'],
            ['ticketId' => 'TKT-10246', 'owner' => 'Amit Patel', 'status' => 'Pending Customer', 'priority' => 'Medium', 'nextAction' => 'Customer to provide logs', 'notes' => 'Sent instructions via email'],
            ['ticketId' => 'TKT-10247', 'owner' => 'Rajesh Kumar', 'status' => 'In Progress', 'priority' => 'Critical', 'nextAction' => 'Deploy hotfix', 'notes' => 'Patch ready, needs approval']
        ],
        'priorityDistribution' => [
            'labels' => ['Low', 'Medium', 'High', 'Critical'],
            'values' => [45, 32, 18, 8]
        ],
        'criticalTickets' => [
            ['ticketId' => 'TKT-10234', 'description' => 'VM instance not starting', 'customer' => 'TechCorp', 'priority' => 'Critical', 'age' => '2h 15m'],
            ['ticketId' => 'TKT-10235', 'description' => 'Database timeout errors', 'customer' => 'CloudFast', 'priority' => 'Critical', 'age' => '1h 45m'],
            ['ticketId' => 'TKT-10237', 'description' => 'K8s cluster scale-up issue', 'customer' => 'TechFlow', 'priority' => 'High', 'age' => '4h']
        ],
        'tickets' => [
            ['ticketId' => 'TKT-10234', 'subject' => 'VM instance not starting after reboot', 'customer' => 'TechCorp Solutions', 'priority' => 'High', 'status' => 'In Progress', 'slaState' => 'Within SLA', 'agent' => 'Rajesh Kumar', 'queue' => 'Technical', 'created' => '2024-03-15 10:30', 'age' => '2h 15m'],
            ['ticketId' => 'TKT-10235', 'subject' => 'Database connection timeout errors', 'customer' => 'CloudFast Inc', 'priority' => 'Critical', 'status' => 'New', 'slaState' => 'At Risk', 'agent' => 'Priya Sharma', 'queue' => 'Technical', 'created' => '2024-03-15 11:00', 'age' => '1h 45m'],
            ['ticketId' => 'TKT-10236', 'subject' => 'Billing inquiry - invoice discrepancy', 'customer' => 'DataSys Ltd', 'priority' => 'Low', 'status' => 'Resolved', 'slaState' => 'Within SLA', 'agent' => 'Amit Patel', 'queue' => 'Billing', 'created' => '2024-03-15 09:15', 'age' => '3h 30m'],
            ['ticketId' => 'TKT-10237', 'subject' => 'Kubernetes cluster scale-up not working', 'customer' => 'TechFlow Systems', 'priority' => 'High', 'status' => 'In Progress', 'slaState' => 'Within SLA', 'agent' => 'Sneha Verma', 'queue' => 'Technical', 'created' => '2024-03-15 08:45', 'age' => '4h'],
            ['ticketId' => 'TKT-10238', 'subject' => 'Storage volume full - need expansion', 'customer' => 'CloudBase Ltd', 'priority' => 'Medium', 'status' => 'Pending Customer', 'slaState' => 'Within SLA', 'agent' => 'Rajesh Kumar', 'queue' => 'Technical', 'created' => '2024-03-14 16:20', 'age' => '20h 25m']
        ]
    ];

    return $data;
}

echo json_encode(generateSupportData($view));
?>