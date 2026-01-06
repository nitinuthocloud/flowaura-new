<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];
$period = isset($_GET['period']) ? $_GET['period'] : 'month';

// Handle POST/PUT requests
if ($method === 'POST' || $method === 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    echo json_encode(['success' => true, 'message' => 'Data updated successfully', 'data' => $input]);
    exit;
}

function generateAccountData($period)
{
    $data = [
        'kpis' => [
            ['label' => 'Total MRR', 'value' => '₹42.8L', 'trend' => 8.5, 'subtitle' => 'Monthly Recurring Revenue'],
            ['label' => 'Net Revenue Change', 'value' => '₹3.2L', 'trend' => 0, 'subtitle' => 'Expansion - Contraction - Churn'],
            ['label' => 'Churn Rate', 'value' => '2.4%', 'trend' => 0, 'subtitle' => 'Last 90 days'],
            ['label' => 'At-Risk Accounts', 'value' => '12', 'trend' => 0, 'subtitle' => 'Based on health score'],
            ['label' => 'Active Advocates', 'value' => '34', 'trend' => 5, 'subtitle' => 'Referral & testimonial ready'],
            ['label' => 'Avg Health Score', 'value' => '78/100', 'trend' => 0, 'subtitle' => 'Weighted average']
        ],
        'followupKpis' => [
            'overdue' => 8,
            'today' => 5,
            'week' => 12,
            'month' => 28
        ],
        'healthDistribution' => [
            'labels' => ['Healthy', 'Watchlist', 'At Risk', 'Critical'],
            'values' => [85, 34, 19, 9]
        ],
        'renewals' => [
            ['id' => 1, 'date' => 'Feb 15, 2025', 'account' => 'Acme Corp', 'manager' => 'Priya Sharma', 'mrr' => 250000, 'status' => 'Prepared Lost'],
            ['id' => 2, 'date' => 'Feb 22, 2025', 'account' => 'Beta Solutions', 'manager' => 'Buying FMCG SAAS', 'mrr' => 350000, 'status' => 'Renewed'],
            ['id' => 3, 'date' => 'Mar 3, 2025', 'account' => 'Gamma Tech', 'manager' => 'In Process', 'mrr' => 500000, 'status' => 'In Process'],
            ['id' => 4, 'date' => 'Mar 12, 2025', 'account' => 'Delta Platforms', 'manager' => 'Getting Offer', 'mrr' => 85000, 'status' => 'Closed']
        ],
        'followUps' => [
            [
                'id' => 1,
                'type' => 'Renewal QBR',
                'followupTime' => 'Today - 11:00 AM',
                'accountName' => 'Acme Corp',
                'lastMessage' => 'Discuss Q4 contract renewal + 2 critical tickets',
                'assignedTo' => 'Rohit Sharma',
                'department' => 'Sales',
                'userId' => '#REF-2025-001',
                'accountStatus' => 'QBR',
                'amount' => 0,
                'entryTime' => '2025-12-03 09:45 AM',
                'completed' => false,
                'accountDetails' => [
                    'id' => 194324,
                    'company' => 'Mobioffice software innovations pvt. ltd.',
                    'contactName' => 'Mayank Jain',
                    'customerSince' => '2023-08-02 11:59:15',
                    'currentCredit' => 'Rs.124.66',
                    'freeCredit' => 'Rs.0 (null)',
                    'totalBusiness' => 'Rs.517562.01',
                    'recentCoupon' => 'null',
                    'firstname' => 'Mayank',
                    'lastname' => 'Jain',
                    'jobTitle' => '',
                    'mobile' => '+919925037646',
                    'email' => 'mayank@mymobioffice.com',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                    'owner' => 'Anushree',
                    'status' => 'Active',
                    'source' => 'Cloud Account',
                    'medium' => '0',
                    'activities' => [
                        ['user' => 'Anushree', 'createdAt' => '2025-12-04 13:34:07', 'dueAt' => '2025-12-05 12:25:00', 'description' => 'call', 'completed' => false],
                        ['user' => 'Anushree', 'createdAt' => '2025-11-27 18:59:12', 'dueAt' => '2025-12-02 18:50:00', 'description' => 'meeting scheduled 2nd', 'completed' => true]
                    ]
                ]
            ],
            [
                'id' => 2,
                'type' => 'Ticket Review',
                'followupTime' => 'Today - 3:00 PM',
                'accountName' => 'Beta Solutions',
                'lastMessage' => 'Review closed Jira tickets + follow up',
                'assignedTo' => 'Neha Patel',
                'department' => 'Support',
                'userId' => '#REF-2025-002',
                'accountStatus' => 'FEED BACK',
                'amount' => 0,
                'entryTime' => '2025-12-03 01:20 PM',
                'completed' => false,
                'accountDetails' => []
            ],
            [
                'id' => 3,
                'type' => 'Payment Followup',
                'followupTime' => 'Tomorrow - 10:30 AM',
                'accountName' => 'Gamma Tech',
                'lastMessage' => 'Reminder for invoice #452 payment',
                'assignedTo' => 'Amit Verma',
                'department' => 'Billing',
                'userId' => '#REF-2025-015',
                'accountStatus' => 'UP SELL',
                'amount' => 150000,
                'entryTime' => '2025-12-03 10:10 AM',
                'completed' => false,
                'accountDetails' => []
            ],
            [
                'id' => 4,
                'type' => 'Health Check',
                'followupTime' => 'Dec 10 - 2:00 PM',
                'accountName' => 'Delta Platforms',
                'lastMessage' => 'Quarterly health check call',
                'assignedTo' => 'Priya Singh',
                'department' => 'Technical',
                'userId' => '#REF-2025-020',
                'accountStatus' => 'CROSS SELL',
                'amount' => 280000,
                'entryTime' => '2025-12-01 11:00 AM',
                'completed' => false,
                'accountDetails' => []
            ]
        ],
        'referralPipeline' => [
            ['id' => 1, 'referrer' => 'Acme Corp', 'referred' => 'NewTech Solutions', 'status' => 'Interested', 'mrr' => 150000, 'userId' => '#REF-2025-001'],
            ['id' => 2, 'referrer' => 'Beta Solutions', 'referred' => 'Gamma Tech', 'status' => 'In contact', 'mrr' => 90000, 'userId' => '#REF-2025-002'],
            ['id' => 3, 'referrer' => 'Gamma Tech', 'referred' => 'Epsilon Ltd', 'status' => 'New', 'mrr' => 150000, 'userId' => '#REF-2025-015']
        ],
        'referralStats' => ['referrals' => 28, 'testimonials' => 12, 'potentialMrr' => '₹8.4L'],
        'mrrTrend' => [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'existingMrr' => [38, 39, 40, 41, 42, 42.8],
            'collectionMrr' => [36, 37, 38, 39, 40, 41],
            'netGrowth' => 13.2
        ]
    ];
    return $data;
}

echo json_encode(generateAccountData($period));
?>