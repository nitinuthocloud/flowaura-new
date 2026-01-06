<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = [
    'salesVsCollection' => [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        'invoiced' => [38, 42, 45, 48, 52, 49, 47, 45],
        'collected' => [35, 39, 41, 44, 48, 46, 44, 39],
        'pending' => [3, 3, 4, 4, 4, 3, 3, 6]
    ],
    
    'agingBuckets' => [
        ['label' => 'Not Due', 'amount' => '3.6', 'count' => 28, 'color' => '#10b981'],
        ['label' => '0-30 days', 'amount' => '1.8', 'count' => 15, 'color' => '#3b82f6'],
        ['label' => '31-60 days', 'amount' => '0.7', 'count' => 8, 'color' => '#f59e0b'],
        ['label' => '61-90 days', 'amount' => '0.2', 'count' => 3, 'color' => '#ef4444'],
        ['label' => '>90 days', 'amount' => '0.1', 'count' => 2, 'color' => '#991b1b']
    ],
    
    'overdueDetails' => [
        [
            'customer' => 'TechCorp Solutions',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'invoiceNo' => 'INV-2024-1245',
            'invoiceDate' => '2024-09-15',
            'dueDate' => '2024-10-15',
            'amount' => '2,85,000',
            'paid' => '0',
            'outstanding' => '2,85,000',
            'daysOverdue' => 77,
            'status' => 'Unpaid',
            'statusClass' => 'unpaid'
        ],
        [
            'customer' => 'CloudStart Inc',
            'type' => 'Overseas',
            'typeClass' => 'overseas',
            'invoiceNo' => 'INV-2024-1156',
            'invoiceDate' => '2024-10-01',
            'dueDate' => '2024-11-01',
            'amount' => '1,56,000',
            'paid' => '50,000',
            'outstanding' => '1,06,000',
            'daysOverdue' => 61,
            'status' => 'Partially Paid',
            'statusClass' => 'partial'
        ],
        [
            'customer' => 'DataHub Systems',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'invoiceNo' => 'INV-2024-1267',
            'invoiceDate' => '2024-10-10',
            'dueDate' => '2024-11-10',
            'amount' => '3,25,000',
            'paid' => '0',
            'outstanding' => '3,25,000',
            'daysOverdue' => 52,
            'status' => 'In Collection',
            'statusClass' => 'overdue'
        ],
        [
            'customer' => 'WebScale Ltd',
            'type' => 'Unregistered',
            'typeClass' => 'unregistered',
            'invoiceNo' => 'INV-2024-1289',
            'invoiceDate' => '2024-10-20',
            'dueDate' => '2024-11-20',
            'amount' => '89,000',
            'paid' => '0',
            'outstanding' => '89,000',
            'daysOverdue' => 42,
            'status' => 'Unpaid',
            'statusClass' => 'unpaid'
        ],
        [
            'customer' => 'InnovateTech',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'invoiceNo' => 'INV-2024-1301',
            'invoiceDate' => '2024-11-01',
            'dueDate' => '2024-12-01',
            'amount' => '4,12,000',
            'paid' => '2,00,000',
            'outstanding' => '2,12,000',
            'daysOverdue' => 31,
            'status' => 'Partially Paid',
            'statusClass' => 'partial'
        ]
    ],
    
    'refundMetrics' => [
        'totalAmount' => '2.1L',
        'count' => 27,
        'rate' => 4.3,
        'reasons' => [
            'labels' => ['Service Issue', 'Overbilling', 'Trial Cancel', 'Double Payment', 'Customer Request'],
            'values' => [8, 6, 5, 4, 4]
        ]
    ],
    
    'refundDetails' => [
        [
            'date' => '2024-11-28',
            'customer' => 'TechCorp Solutions',
            'invoiceNo' => 'INV-2024-1198',
            'refundId' => 'REF-2024-045',
            'amount' => '15,000',
            'reason' => 'Overbilling',
            'processedBy' => 'Sneha Verma',
            'status' => 'Processed',
            'statusClass' => 'paid'
        ],
        [
            'date' => '2024-11-27',
            'customer' => 'CloudFast Inc',
            'invoiceNo' => 'INV-2024-1215',
            'refundId' => 'REF-2024-044',
            'amount' => '8,500',
            'reason' => 'Trial Cancellation',
            'processedBy' => 'Rajesh Kumar',
            'status' => 'Processed',
            'statusClass' => 'paid'
        ],
        [
            'date' => '2024-11-26',
            'customer' => 'DataSync Pro',
            'invoiceNo' => 'INV-2024-1234',
            'refundId' => 'REF-2024-043',
            'amount' => '12,000',
            'reason' => 'Service Issue',
            'processedBy' => 'Amit Patel',
            'status' => 'Processing',
            'statusClass' => 'partial'
        ],
        [
            'date' => '2024-11-25',
            'customer' => 'SecureCloud Inc',
            'invoiceNo' => 'INV-2024-1256',
            'refundId' => 'REF-2024-042',
            'amount' => '25,000',
            'reason' => 'Double Payment',
            'processedBy' => 'Priya Sharma',
            'status' => 'Processed',
            'statusClass' => 'paid'
        ],
        [
            'date' => '2024-11-24',
            'customer' => 'TechFlow Systems',
            'invoiceNo' => 'INV-2024-1278',
            'refundId' => 'REF-2024-041',
            'amount' => '18,500',
            'reason' => 'Service Issue',
            'processedBy' => 'Sneha Verma',
            'status' => 'Processed',
            'statusClass' => 'paid'
        ]
    ],
    
    'gstDetails' => [
        [
            'invoiceNo' => 'INV-2024-1245',
            'customer' => 'TechCorp Solutions',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'placeOfSupply' => 'Maharashtra',
            'taxableValue' => '2,41,525',
            'cgst' => '21,737',
            'sgst' => '21,737',
            'igst' => '0',
            'category' => 'B2B'
        ],
        [
            'invoiceNo' => 'INV-2024-1156',
            'customer' => 'CloudStart Inc',
            'type' => 'Overseas',
            'typeClass' => 'overseas',
            'placeOfSupply' => 'USA',
            'taxableValue' => '1,56,000',
            'cgst' => '0',
            'sgst' => '0',
            'igst' => '0',
            'category' => 'Export'
        ],
        [
            'invoiceNo' => 'INV-2024-1267',
            'customer' => 'DataHub Systems',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'placeOfSupply' => 'Karnataka',
            'taxableValue' => '2,75,424',
            'cgst' => '0',
            'sgst' => '0',
            'igst' => '49,576',
            'category' => 'B2B'
        ],
        [
            'invoiceNo' => 'INV-2024-1289',
            'customer' => 'WebScale Ltd',
            'type' => 'Unregistered',
            'typeClass' => 'unregistered',
            'placeOfSupply' => 'Delhi',
            'taxableValue' => '75,424',
            'cgst' => '6,788',
            'sgst' => '6,788',
            'igst' => '0',
            'category' => 'B2C'
        ],
        [
            'invoiceNo' => 'INV-2024-1301',
            'customer' => 'InnovateTech',
            'type' => 'Registered',
            'typeClass' => 'registered',
            'placeOfSupply' => 'Tamil Nadu',
            'taxableValue' => '3,49,153',
            'cgst' => '0',
            'sgst' => '0',
            'igst' => '62,847',
            'category' => 'B2B'
        ]
    ],
    
    'customerHealth' => [
        [
            'name' => 'TechVision Pvt Ltd',
            'mrr' => '95,000',
            'healthScore' => 92,
            'avgDelay' => 3,
            'totalOverdues' => '0',
            'refundCount' => 0,
            'riskLevel' => 'Low',
            'riskClass' => 'healthy'
        ],
        [
            'name' => 'CloudWorks Solutions',
            'mrr' => '1,25,000',
            'healthScore' => 88,
            'avgDelay' => 7,
            'totalOverdues' => '50,000',
            'refundCount' => 1,
            'riskLevel' => 'Low',
            'riskClass' => 'healthy'
        ],
        [
            'name' => 'DataCore Systems',
            'mrr' => '85,000',
            'healthScore' => 65,
            'avgDelay' => 28,
            'totalOverdues' => '2,15,000',
            'refundCount' => 2,
            'riskLevel' => 'Medium',
            'riskClass' => 'risk'
        ],
        [
            'name' => 'StartupHub',
            'mrr' => '35,000',
            'healthScore' => 45,
            'avgDelay' => 52,
            'totalOverdues' => '4,20,000',
            'refundCount' => 4,
            'riskLevel' => 'High',
            'riskClass' => 'high-risk'
        ],
        [
            'name' => 'WebScale Pro',
            'mrr' => '65,000',
            'healthScore' => 78,
            'avgDelay' => 12,
            'totalOverdues' => '85,000',
            'refundCount' => 1,
            'riskLevel' => 'Low',
            'riskClass' => 'healthy'
        ],
        [
            'name' => 'InnovateTech Ltd',
            'mrr' => '1,45,000',
            'healthScore' => 38,
            'avgDelay' => 67,
            'totalOverdues' => '5,80,000',
            'refundCount' => 3,
            'riskLevel' => 'High',
            'riskClass' => 'high-risk'
        ]
    ],
    
    'productRevenue' => [
        'labels' => ['VMs', 'Kubernetes', 'Object Storage', 'Databases', 'Load Balancers'],
        'invoiced' => [22.5, 15.8, 10.2, 6.5, 3.8],
        'collected' => [21.2, 14.5, 9.5, 6.0, 3.5]
    ],
    
    'teamPerformance' => [
        [
            'name' => 'Anita Desai',
            'invoices' => 142,
            'amount' => '12.5M',
            'collections' => '11.2M',
            'reminders' => 245,
            'refunds' => 12,
            'errors' => 2,
            'invoiceTime' => '1.2',
            'paymentTime' => '2.8'
        ],
        [
            'name' => 'Rahul Verma',
            'invoices' => 128,
            'amount' => '10.8M',
            'collections' => '9.5M',
            'reminders' => 198,
            'refunds' => 8,
            'errors' => 1,
            'invoiceTime' => '1.5',
            'paymentTime' => '3.2'
        ],
        [
            'name' => 'Priya Gupta',
            'invoices' => 156,
            'amount' => '14.2M',
            'collections' => '12.8M',
            'reminders' => 287,
            'refunds' => 15,
            'errors' => 3,
            'invoiceTime' => '1.1',
            'paymentTime' => '2.5'
        ],
        [
            'name' => 'Amit Shah',
            'invoices' => 134,
            'amount' => '11.6M',
            'collections' => '10.2M',
            'reminders' => 223,
            'refunds' => 10,
            'errors' => 2,
            'invoiceTime' => '1.4',
            'paymentTime' => '3.0'
        ]
    ],
    
    'alerts' => [
        [
            'severity' => 'High',
            'title' => 'Large Overdue Amount - InnovateTech Ltd',
            'description' => 'Outstanding amount of ₹5.8L overdue by 67 days. Customer has repeated payment delays.',
            'action' => 'Escalate to Sales'
        ],
        [
            'severity' => 'High',
            'title' => 'Very Old Outstanding - TechCorp Solutions',
            'description' => 'Invoice INV-2024-1234 is 90+ days overdue. Amount: ₹2.85L',
            'action' => 'Contact Legal'
        ],
        [
            'severity' => 'Medium',
            'title' => 'High Refund Account - DataCore Systems',
            'description' => 'Customer has requested 4 refunds in the last 3 months totaling ₹1.2L.',
            'action' => 'Flag to Support'
        ],
        [
            'severity' => 'Medium',
            'title' => 'GST GSTIN Missing - WebScale Pro',
            'description' => 'Account marked as GST Registered but GSTIN details not on file.',
            'action' => 'Request GSTIN'
        ],
        [
            'severity' => 'Low',
            'title' => 'Negative Balance - CloudStart Inc',
            'description' => 'Customer account shows negative balance of ₹15K due to double payment.',
            'action' => 'Process Refund'
        ],
        [
            'severity' => 'High',
            'title' => 'Collection Issue - Multiple Accounts',
            'description' => '8 invoices from different customers have crossed 60-day overdue mark this week.',
            'action' => 'Bulk Follow-up'
        ]
    ]
];

echo json_encode($data);
?>
