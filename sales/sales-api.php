<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dashboardData = [
    'followUpTasks' => [
        [
            'id' => '12345',
            'type' => 'Call',
            'status' => 'Pending',
            'followup_time' => '2025-01-15 10:30',
            'reference' => 'Nitin Sharma',
            'last_message' => 'Follow up on cloud migration proposal',
            'assigned_to' => 'Nitin',
            'department' => 'Sales',
            'refrence' => 'Client',
            'entrytime' => '2025-01-10',
            'completed' => '-',
            'category' => 'overdue',
            'contact' => [
                'firstname' => 'Nitin',
                'lastname' => 'Sharma',
                'email' => 'nitin.sharma@cloudventures.com',
                'mobile' => '+91 98765 43210',
                'job_title' => 'CTO',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'country' => 'India',
                'owner' => 'Nitin',
                'status' => 'Active',
                'source' => 'Website',
                'medium' => 'Organic'
            ],
            'activities' => [
                ['user' => 'Nitin', 'datetime' => '2025-01-10 09:30', 'due' => '2025-01-15 10:30', 'note' => 'Initial contact made, interested in cloud migration', 'completed' => true],
                ['user' => 'Nitin', 'datetime' => '2025-01-12 14:00', 'due' => '2025-01-15 10:30', 'note' => 'Sent proposal document via email', 'completed' => true],
                ['user' => 'Nitin', 'datetime' => '2025-01-14 11:00', 'due' => '2025-01-15 10:30', 'note' => 'Follow up call scheduled for tomorrow', 'completed' => false]
            ]
        ],
        [
            'id' => '12346',
            'type' => 'Email',
            'status' => 'Completed',
            'followup_time' => '2025-01-14 14:00',
            'reference' => 'Priya Patel',
            'last_message' => 'Send pricing details for VM instances',
            'assigned_to' => 'Aravind',
            'department' => 'Pre-Sales',
            'refrence' => 'Lead',
            'entrytime' => '2025-01-08',
            'completed' => '2025-01-14',
            'category' => 'today',
            'contact' => [
                'firstname' => 'Priya',
                'lastname' => 'Patel',
                'email' => 'priya.patel@datasync.com',
                'mobile' => '+91 87654 32109',
                'job_title' => 'IT Manager',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'India',
                'owner' => 'Aravind',
                'status' => 'Qualified',
                'source' => 'Referral',
                'medium' => 'Partner'
            ],
            'activities' => [
                ['user' => 'Aravind', 'datetime' => '2025-01-08 10:00', 'due' => '2025-01-14 14:00', 'note' => 'Received inquiry about VM pricing', 'completed' => true],
                ['user' => 'Aravind', 'datetime' => '2025-01-14 14:00', 'due' => '2025-01-14 14:00', 'note' => 'Sent detailed pricing via email', 'completed' => true]
            ]
        ],
        [
            'id' => '12347',
            'type' => 'Meeting',
            'status' => 'Overdue',
            'followup_time' => '2025-01-12 11:00',
            'reference' => 'Rajesh Kumar',
            'last_message' => 'Demo scheduled for Kubernetes solution',
            'assigned_to' => 'Latif',
            'department' => 'Technical',
            'refrence' => 'Prospect',
            'entrytime' => '2025-01-05',
            'completed' => '-',
            'category' => 'overdue',
            'contact' => [
                'firstname' => 'Rajesh',
                'lastname' => 'Kumar',
                'email' => 'rajesh.kumar@techpro.in',
                'mobile' => '+91 76543 21098',
                'job_title' => 'DevOps Lead',
                'city' => 'Hyderabad',
                'state' => 'Telangana',
                'country' => 'India',
                'owner' => 'Latif',
                'status' => 'Hot',
                'source' => 'Cold Call',
                'medium' => 'Outbound'
            ],
            'activities' => [
                ['user' => 'Latif', 'datetime' => '2025-01-05 09:00', 'due' => '2025-01-12 11:00', 'note' => 'Initial call - interested in K8s', 'completed' => true],
                ['user' => 'Latif', 'datetime' => '2025-01-12 11:00', 'due' => '2025-01-12 11:00', 'note' => 'Demo meeting - needs to reschedule', 'completed' => false]
            ]
        ],
        [
            'id' => '12348',
            'type' => 'Call',
            'status' => 'Pending',
            'followup_time' => '2025-01-16 09:00',
            'reference' => 'Suresh Reddy',
            'last_message' => 'Discuss backup solution requirements',
            'assigned_to' => 'Neelam',
            'department' => 'Support',
            'refrence' => 'Client',
            'entrytime' => '2025-01-11',
            'completed' => '-',
            'category' => 'today',
            'contact' => [
                'firstname' => 'Suresh',
                'lastname' => 'Reddy',
                'email' => 'suresh@enterprise.co.in',
                'mobile' => '+91 65432 10987',
                'job_title' => 'System Admin',
                'city' => 'Chennai',
                'state' => 'Tamil Nadu',
                'country' => 'India',
                'owner' => 'Neelam',
                'status' => 'Active',
                'source' => 'Website',
                'medium' => 'Paid'
            ],
            'activities' => [
                ['user' => 'Neelam', 'datetime' => '2025-01-11 15:00', 'due' => '2025-01-16 09:00', 'note' => 'Client needs DR solution discussion', 'completed' => false]
            ]
        ],
        [
            'id' => '12349',
            'type' => 'Email',
            'status' => 'Pending',
            'followup_time' => '2025-01-17 15:30',
            'reference' => 'Amit Joshi',
            'last_message' => 'Contract renewal discussion',
            'assigned_to' => 'Nitin',
            'department' => 'Sales',
            'refrence' => 'Client',
            'entrytime' => '2025-01-09',
            'completed' => '-',
            'category' => 'week',
            'contact' => [
                'firstname' => 'Amit',
                'lastname' => 'Joshi',
                'email' => 'amit.joshi@fintech.com',
                'mobile' => '+91 54321 09876',
                'job_title' => 'VP Engineering',
                'city' => 'Pune',
                'state' => 'Maharashtra',
                'country' => 'India',
                'owner' => 'Nitin',
                'status' => 'Renewal',
                'source' => 'Existing',
                'medium' => 'Direct'
            ],
            'activities' => [
                ['user' => 'Nitin', 'datetime' => '2025-01-09 10:00', 'due' => '2025-01-17 15:30', 'note' => 'Contract expires next month, need to discuss renewal terms', 'completed' => false]
            ]
        ],
        [
            'id' => '12350',
            'type' => 'Meeting',
            'status' => 'Completed',
            'followup_time' => '2025-01-13 16:00',
            'reference' => 'Meera Singh',
            'last_message' => 'POC completed successfully',
            'assigned_to' => 'Aravind',
            'department' => 'Technical',
            'refrence' => 'Prospect',
            'entrytime' => '2025-01-07',
            'completed' => '2025-01-13',
            'category' => 'week',
            'contact' => [
                'firstname' => 'Meera',
                'lastname' => 'Singh',
                'email' => 'meera@startup.io',
                'mobile' => '+91 43210 98765',
                'job_title' => 'CEO',
                'city' => 'Delhi',
                'state' => 'Delhi',
                'country' => 'India',
                'owner' => 'Aravind',
                'status' => 'Won',
                'source' => 'Event',
                'medium' => 'Conference'
            ],
            'activities' => [
                ['user' => 'Aravind', 'datetime' => '2025-01-13 16:00', 'due' => '2025-01-13 16:00', 'note' => 'POC successful, moving to contract', 'completed' => true]
            ]
        ],
        [
            'id' => '12351',
            'type' => 'Call',
            'status' => 'Overdue',
            'followup_time' => '2025-01-10 10:00',
            'reference' => 'Vikram Mehta',
            'last_message' => 'Follow up on storage quote',
            'assigned_to' => 'Latif',
            'department' => 'Sales',
            'refrence' => 'Lead',
            'entrytime' => '2025-01-03',
            'completed' => '-',
            'category' => 'overdue',
            'contact' => [
                'firstname' => 'Vikram',
                'lastname' => 'Mehta',
                'email' => 'vikram@media.co',
                'mobile' => '+91 32109 87654',
                'job_title' => 'IT Director',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'country' => 'India',
                'owner' => 'Latif',
                'status' => 'Cold',
                'source' => 'LinkedIn',
                'medium' => 'Social'
            ],
            'activities' => [
                ['user' => 'Latif', 'datetime' => '2025-01-03 14:00', 'due' => '2025-01-10 10:00', 'note' => 'Sent storage pricing, no response yet', 'completed' => false]
            ]
        ],
        [
            'id' => '12352',
            'type' => 'Email',
            'status' => 'Pending',
            'followup_time' => '2025-01-18 11:30',
            'reference' => 'Deepak Verma',
            'last_message' => 'Send case study documents',
            'assigned_to' => 'Neelam',
            'department' => 'Marketing',
            'refrence' => 'Lead',
            'entrytime' => '2025-01-12',
            'completed' => '-',
            'category' => 'next30',
            'contact' => [
                'firstname' => 'Deepak',
                'lastname' => 'Verma',
                'email' => 'deepak@retail.in',
                'mobile' => '+91 21098 76543',
                'job_title' => 'CIO',
                'city' => 'Ahmedabad',
                'state' => 'Gujarat',
                'country' => 'India',
                'owner' => 'Neelam',
                'status' => 'Warm',
                'source' => 'Webinar',
                'medium' => 'Online'
            ],
            'activities' => [
                ['user' => 'Neelam', 'datetime' => '2025-01-12 10:00', 'due' => '2025-01-18 11:30', 'note' => 'Requested case studies for retail sector', 'completed' => false]
            ]
        ],
        [
            'id' => '12353',
            'type' => 'Meeting',
            'status' => 'Pending',
            'followup_time' => '2025-01-19 14:00',
            'reference' => 'Anita Gupta',
            'last_message' => 'Final negotiation meeting',
            'assigned_to' => 'Nitin',
            'department' => 'Sales',
            'refrence' => 'Prospect',
            'entrytime' => '2025-01-14',
            'completed' => '-',
            'category' => 'next30',
            'contact' => [
                'firstname' => 'Anita',
                'lastname' => 'Gupta',
                'email' => 'anita@pharma.com',
                'mobile' => '+91 10987 65432',
                'job_title' => 'Head of IT',
                'city' => 'Kolkata',
                'state' => 'West Bengal',
                'country' => 'India',
                'owner' => 'Nitin',
                'status' => 'Negotiation',
                'source' => 'Referral',
                'medium' => 'Partner'
            ],
            'activities' => [
                ['user' => 'Nitin', 'datetime' => '2025-01-14 09:00', 'due' => '2025-01-19 14:00', 'note' => 'Final pricing discussion scheduled', 'completed' => false]
            ]
        ],
        [
            'id' => '12354',
            'type' => 'Call',
            'status' => 'Completed',
            'followup_time' => '2025-01-11 13:00',
            'reference' => 'Kiran Rao',
            'last_message' => 'Technical requirements gathered',
            'assigned_to' => 'Aravind',
            'department' => 'Technical',
            'refrence' => 'Client',
            'entrytime' => '2025-01-06',
            'completed' => '2025-01-11',
            'category' => 'next30',
            'contact' => [
                'firstname' => 'Kiran',
                'lastname' => 'Rao',
                'email' => 'kiran@logistics.in',
                'mobile' => '+91 09876 54321',
                'job_title' => 'Tech Lead',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'India',
                'owner' => 'Aravind',
                'status' => 'Active',
                'source' => 'Website',
                'medium' => 'Organic'
            ],
            'activities' => [
                ['user' => 'Aravind', 'datetime' => '2025-01-11 13:00', 'due' => '2025-01-11 13:00', 'note' => 'Gathered all technical requirements', 'completed' => true]
            ]
        ]
    ],
    'kpis' => [
        'total_business' => '₹ 68.02L',
        'active_mrr' => '₹ 45.3K',
        'new_business' => '₹ 32.5L',
        'funnel_size' => '₹ 125.8L',
        'total_leads' => '₹ 125.8L',
        'converted_leads' => '₹ 125.8L',
        'newMeetings' => '1,247',
        'leadQualified' => '342',
        'newLeads' => '89',
        'active' => '523',
        'retargeting' => '156',
        'urgent' => '78',
        'not_contacted' => '78',
        'contacted' => '78',
        'junk' => '78',
        'meeting_joined' => '78',
        'meeting_not_joined' => '78',
        'payment_done' => '78',
        'poc' => '78',
        'negotiation_and_review' => '78',
    ],
    'total_funnel_value' => [
        'deals_lost' => '₹ 68.02L',
        'deals_won' => '₹ 45.3K',
        'aspects_added' => '₹ 32.5L',
        'funnel_value' => '₹ 125.8L'
    ],
    'dealsLostReasons' => [
        'High Quote',
        'Budget Constraints',
        'Support Quality',
        'Scalability Concerns',
        'Limited Trial Period',
        'Lack of Awareness',
        'Migration Concerns',
        'Integration Challenges',
        'Change Resistance',
        'Internal Approval Delays',
        'Non-Serviceable',
        'Product Unavailability',
        'Feature Unavailability',
        'Lack of Paperwork',
        'Unresponsive'
    ],
    'dealsWonTypes' => ['3Years', 'Annual', 'Hourly', 'MRR', 'Quarterly'],
    'dealsLostData' => [
        ['id' => 1, 'name' => 'Cloud Migration Deal', 'company' => 'TechStart Inc', 'value' => '₹ 12.5L', 'lossReason' => 'High Quote', 'lostDate' => '2025-01-10', 'rep' => 'TRM'],
        ['id' => 2, 'name' => 'VM Infrastructure', 'company' => 'RetailMax', 'value' => '₹ 8.2L', 'lossReason' => 'Budget Constraints', 'lostDate' => '2025-01-08', 'rep' => 'ZRM'],
        ['id' => 3, 'name' => 'Kubernetes Setup', 'company' => 'FinServ Ltd', 'value' => '₹ 15.0L', 'lossReason' => 'Migration Concerns', 'lostDate' => '2025-01-05', 'rep' => 'TRM'],
        ['id' => 4, 'name' => 'Backup Solution', 'company' => 'MediaHouse', 'value' => '₹ 5.8L', 'lossReason' => 'Support Quality', 'lostDate' => '2025-01-03', 'rep' => 'PRS'],
        ['id' => 5, 'name' => 'DR Setup', 'company' => 'EduTech', 'value' => '₹ 9.5L', 'lossReason' => 'Unresponsive', 'lostDate' => '2024-12-28', 'rep' => 'ZRM']
    ],
    'dealsWonData' => [
        ['id' => 1, 'name' => 'Enterprise Cloud Package', 'company' => 'GlobalCorp', 'value' => '₹ 25.0L', 'contractType' => '3Years', 'closedDate' => '2025-01-12', 'rep' => 'TRM'],
        ['id' => 2, 'name' => 'VM Hosting', 'company' => 'StartupXYZ', 'value' => '₹ 4.5L', 'contractType' => 'Annual', 'closedDate' => '2025-01-10', 'rep' => 'ZRM'],
        ['id' => 3, 'name' => 'Object Storage', 'company' => 'MediaCo', 'value' => '₹ 2.8L', 'contractType' => 'MRR', 'closedDate' => '2025-01-08', 'rep' => 'PRS'],
        ['id' => 4, 'name' => 'Load Balancer Setup', 'company' => 'EcomStore', 'value' => '₹ 1.2L', 'contractType' => 'Quarterly', 'closedDate' => '2025-01-06', 'rep' => 'TRM'],
        ['id' => 5, 'name' => 'Consulting Hours', 'company' => 'BankIT', 'value' => '₹ 3.0L', 'contractType' => 'Hourly', 'closedDate' => '2025-01-04', 'rep' => 'ZRM']
    ],
    'headerList' => [
        'overdue_followups' => 89,
        'today_due_followups' => 523,
        'this_week_due_followups' => 234,
        'next_30_days_due' => 83
    ],
    'recentActivity' => [
        ['user' => 'Latif just', 'description' => 'added EMC Corp', 'details' => 'deal worth ₹2.5L to the pipeline', 'time' => '3 hours ago', 'type' => 'deal'],
        ['user' => 'Neelam Has', 'description' => 'scheduled a meeting with XYZ Corp for negotiation', 'details' => '', 'time' => '5 hours ago', 'type' => 'meeting'],
        ['user' => 'Aravind sent', 'description' => 'a help sheet lead about', 'details' => '', 'time' => '6 hours ago', 'type' => 'email'],
        ['user' => 'VR with updated', 'description' => 'meeting with Apex Digital Agency', 'details' => '', 'time' => 'Yesterday', 'type' => 'meeting']
    ],
    'salesTargets' => [
        ['id' => 'target-001', 'rep' => 'TRM', 'quarter' => 'Q4 (Oct-Dec)', 'wholeTotalTarget' => '₹ 7.16Lk', 'targetMRR' => '₹ 2.36Lk', 'wholeMonth1' => '₹ 2.30Lk', 'wholeMonth2' => '₹ 2.40Lk', 'wholeMonth3' => '₹ 2.46Lk', 'mrrMonth1' => '₹ 1.40K', 'mrrMonth2' => '₹ 1.50K', 'mrrMonth3' => '₹ 1.53K', 'achievedRevenue' => '₹ 6.23Lk', 'achievedMRR' => '₹ 3.53K', 'achievement' => '88%', 'status' => 'On Track'],
        ['id' => 'target-002', 'rep' => 'ZRM', 'quarter' => 'Q4 (Oct-Dec)', 'wholeTotalTarget' => '₹ 8.66Lk', 'targetMRR' => '₹ 7.80K', 'wholeMonth1' => '₹ 2.80Lk', 'wholeMonth2' => '₹ 2.90Lk', 'wholeMonth3' => '₹ 2.96Lk', 'mrrMonth1' => '₹ 2.40K', 'mrrMonth2' => '₹ 2.60K', 'mrrMonth3' => '₹ 2.80K', 'achievedRevenue' => '₹ 8.02Lk', 'achievedMRR' => '₹ 9.3K', 'achievement' => '106%', 'status' => 'On Track'],
        ['id' => 'target-003', 'rep' => 'PRS', 'quarter' => 'Q4 (Oct-Dec)', 'wholeTotalTarget' => '₹ 9.66Lk', 'targetMRR' => '₹ 9.60K', 'wholeMonth1' => '₹ 3.10Lk', 'wholeMonth2' => '₹ 3.20Lk', 'wholeMonth3' => '₹ 3.36Lk', 'mrrMonth1' => '₹ 3.20K', 'mrrMonth2' => '₹ 3.10K', 'mrrMonth3' => '₹ 3.30K', 'achievedRevenue' => '₹ 7.60Lk', 'achievedMRR' => '₹ 4.83K', 'achievement' => '67%', 'status' => 'At Risk']
    ]
];

echo json_encode($dashboardData);
?>