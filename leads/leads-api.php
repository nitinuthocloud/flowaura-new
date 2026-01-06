<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Get filter parameters
$period = isset($_GET['period']) ? $_GET['period'] : 'month';
$team = isset($_GET['team']) ? $_GET['team'] : 'all';
$source = isset($_GET['source']) ? $_GET['source'] : 'all';

function generateLeadsData($period, $team, $source) {
    return [
        'statusDistribution' => [
            ['status' => 'Not Called', 'count' => 482, 'percentage' => 16.9],
            ['status' => 'Invalid Number', 'count' => 128, 'percentage' => 4.5],
            ['status' => 'Called – No Answer', 'count' => 356, 'percentage' => 12.5],
            ['status' => 'Called – Not Interested', 'count' => 594, 'percentage' => 20.9],
            ['status' => 'Meeting Scheduled', 'count' => 124, 'percentage' => 4.4],
            ['status' => 'Follow-up Required', 'count' => 267, 'percentage' => 9.4],
            ['status' => 'Do Not Call', 'count' => 87, 'percentage' => 3.1],
            ['status' => 'Callback Requested', 'count' => 142, 'percentage' => 5.0],
            ['status' => 'No Longer at Company', 'count' => 94, 'percentage' => 3.3],
            ['status' => 'Sent Information – Awaiting', 'count' => 178, 'percentage' => 6.3],
            ['status' => 'In Lock-In', 'count' => 62, 'percentage' => 2.2],
            ['status' => 'Wrong Details', 'count' => 156, 'percentage' => 5.5],
            ['status' => 'Disconnect', 'count' => 177, 'percentage' => 6.2]
        ],
        
        'teamPerformance' => [
            ['name' => 'Priya Singh', 'team' => 'Inbound', 'assigned' => 287, 'calls' => 312, 'connected' => 252, 'meetings' => 24, 'qualified' => 68, 'conversion' => 8.4],
            ['name' => 'Amit Patel', 'team' => 'Outbound', 'assigned' => 420, 'calls' => 687, 'connected' => 245, 'meetings' => 12, 'qualified' => 38, 'conversion' => 2.9],
            ['name' => 'Sneha Kumar', 'team' => 'Inbound', 'assigned' => 195, 'calls' => 218, 'connected' => 167, 'meetings' => 18, 'qualified' => 45, 'conversion' => 9.2],
            ['name' => 'Rahul Sharma', 'team' => 'Outbound', 'assigned' => 380, 'calls' => 542, 'connected' => 198, 'meetings' => 9, 'qualified' => 28, 'conversion' => 2.4],
            ['name' => 'Anjali Verma', 'team' => 'Inbound', 'assigned' => 310, 'calls' => 345, 'connected' => 278, 'meetings' => 26, 'qualified' => 72, 'conversion' => 8.7],
            ['name' => 'Vikram Joshi', 'team' => 'Outbound', 'assigned' => 450, 'calls' => 712, 'connected' => 267, 'meetings' => 15, 'qualified' => 42, 'conversion' => 3.3],
            ['name' => 'Neha Reddy', 'team' => 'Inbound', 'assigned' => 220, 'calls' => 256, 'connected' => 189, 'meetings' => 20, 'qualified' => 54, 'conversion' => 9.1],
            ['name' => 'Karthik Iyer', 'team' => 'Outbound', 'assigned' => 395, 'calls' => 628, 'connected' => 223, 'meetings' => 11, 'qualified' => 35, 'conversion' => 2.8]
        ],
        
        'followUpTasks' => [
            ['lead' => 'Rohan Enterprises', 'type' => 'Follow-up Call', 'dueDate' => 'Dec 1, 2025, 11:00 AM', 'lastAction' => 'Called - Interested', 'owner' => 'Priya Singh', 'status' => 'Due', 'priority' => 'High'],
            ['lead' => 'TechCorp India', 'type' => 'Demo Scheduled', 'dueDate' => 'Dec 1, 2025, 2:30 PM', 'lastAction' => 'Email sent with calendar invite', 'owner' => 'Amit Patel', 'status' => 'Upcoming', 'priority' => 'High'],
            ['lead' => 'CloudSolutions Ltd', 'type' => 'Proposal Follow-up', 'dueDate' => 'Dec 2, 2025, 10:00 AM', 'lastAction' => 'Proposal shared on Nov 28', 'owner' => 'Sneha Kumar', 'status' => 'Pending', 'priority' => 'Medium'],
            ['lead' => 'DataVault Systems', 'type' => 'Callback Requested', 'dueDate' => 'Dec 2, 2025, 3:00 PM', 'lastAction' => 'Customer asked to call back', 'owner' => 'Rahul Sharma', 'status' => 'Pending', 'priority' => 'Medium'],
            ['lead' => 'InfoTech Solutions', 'type' => 'Trial Check-in', 'dueDate' => 'Dec 3, 2025, 11:30 AM', 'lastAction' => 'Trial started on Nov 27', 'owner' => 'Anjali Verma', 'status' => 'Scheduled', 'priority' => 'Low'],
            ['lead' => 'WebScale Corp', 'type' => 'Contract Negotiation', 'dueDate' => 'Dec 3, 2025, 4:00 PM', 'lastAction' => 'Pricing discussion ongoing', 'owner' => 'Vikram Joshi', 'status' => 'In Progress', 'priority' => 'High'],
            ['lead' => 'AppDynamics India', 'type' => 'Follow-up Email', 'dueDate' => 'Dec 4, 2025, 9:00 AM', 'lastAction' => 'Initial contact made', 'owner' => 'Neha Reddy', 'status' => 'Pending', 'priority' => 'Low'],
            ['lead' => 'HostMaster LLC', 'type' => 'Technical Query', 'dueDate' => 'Dec 4, 2025, 1:00 PM', 'lastAction' => 'Customer asked about DR setup', 'owner' => 'Karthik Iyer', 'status' => 'Pending', 'priority' => 'Medium']
        ],
        
        'leadDatabase' => [
            ['name' => 'Arjun Mehta', 'email' => 'arjun@techcorp.in', 'phone' => '+91 98765 43210', 'company' => 'TechCorp India', 'source' => 'Website', 'status' => 'Meeting Scheduled', 'owner' => 'Priya Singh', 'quality' => 'High', 'useCase' => 'Kubernetes', 'lastActivity' => '1 hour ago'],
            ['name' => 'Kavya Nair', 'email' => 'kavya@cloudsol.com', 'phone' => '+91 98123 45678', 'company' => 'CloudSolutions Ltd', 'source' => 'Apollo', 'status' => 'Follow-up Required', 'owner' => 'Amit Patel', 'quality' => 'High', 'useCase' => 'VMs', 'lastActivity' => '2 hours ago'],
            ['name' => 'Suresh Babu', 'email' => 'suresh@datavault.io', 'phone' => '+91 97654 32109', 'company' => 'DataVault Systems', 'source' => 'Email Campaign', 'status' => 'Callback Requested', 'owner' => 'Sneha Kumar', 'quality' => 'Medium', 'useCase' => 'Storage', 'lastActivity' => '5 hours ago'],
            ['name' => 'Preethi Kumar', 'email' => 'preethi@infotech.in', 'phone' => '+91 99876 54321', 'company' => 'InfoTech Solutions', 'source' => 'Website', 'status' => 'In Lock-In', 'owner' => 'Rahul Sharma', 'quality' => 'High', 'useCase' => 'Database', 'lastActivity' => '1 day ago'],
            ['name' => 'Ramesh Iyer', 'email' => 'ramesh@webscale.com', 'phone' => '+91 98234 56789', 'company' => 'WebScale Corp', 'source' => 'LinkedIn', 'status' => 'Meeting Scheduled', 'owner' => 'Anjali Verma', 'quality' => 'High', 'useCase' => 'Kubernetes', 'lastActivity' => '3 hours ago'],
            ['name' => 'Divya Sharma', 'email' => 'divya@appdyn.in', 'phone' => '+91 97345 67890', 'company' => 'AppDynamics India', 'source' => 'Website', 'status' => 'Follow-up Required', 'owner' => 'Vikram Joshi', 'quality' => 'Medium', 'useCase' => 'VMs', 'lastActivity' => '6 hours ago'],
            ['name' => 'Manoj Gupta', 'email' => 'manoj@hostmaster.com', 'phone' => '+91 96456 78901', 'company' => 'HostMaster LLC', 'source' => 'Cold Call', 'status' => 'Sent Information – Awaiting', 'owner' => 'Neha Reddy', 'quality' => 'Low', 'useCase' => 'DR/Backup', 'lastActivity' => '2 days ago'],
            ['name' => 'Lakshmi Reddy', 'email' => 'lakshmi@quantum.io', 'phone' => '+91 95567 89012', 'company' => 'Quantum Systems', 'source' => 'Referral', 'status' => 'Not Called', 'owner' => 'Karthik Iyer', 'quality' => 'Medium', 'useCase' => 'Storage', 'lastActivity' => '3 days ago'],
            ['name' => 'Anil Kumar', 'email' => 'anil@nexgen.in', 'phone' => '+91 94678 90123', 'company' => 'NexGen Tech', 'source' => 'Website', 'status' => 'Called – No Answer', 'owner' => 'Priya Singh', 'quality' => 'High', 'useCase' => 'Kubernetes', 'lastActivity' => '4 hours ago'],
            ['name' => 'Shalini Desai', 'email' => 'shalini@innovate.com', 'phone' => '+91 93789 01234', 'company' => 'Innovate Corp', 'source' => 'Apollo', 'status' => 'Called – Not Interested', 'owner' => 'Amit Patel', 'quality' => 'Low', 'useCase' => 'VMs', 'lastActivity' => '1 day ago'],
            ['name' => 'Vijay Anand', 'email' => 'vijay@zenith.io', 'phone' => '+91 92890 12345', 'company' => 'Zenith Solutions', 'source' => 'WhatsApp', 'status' => 'Meeting Scheduled', 'owner' => 'Sneha Kumar', 'quality' => 'High', 'useCase' => 'Database', 'lastActivity' => '2 hours ago'],
            ['name' => 'Ananya Rao', 'email' => 'ananya@cloudpeak.in', 'phone' => '+91 91901 23456', 'company' => 'CloudPeak Ltd', 'source' => 'Email Campaign', 'status' => 'Follow-up Required', 'owner' => 'Rahul Sharma', 'quality' => 'Medium', 'useCase' => 'Storage', 'lastActivity' => '7 hours ago']
        ],
        
        'leadQuality' => [
            'highQuality' => 892,
            'mediumQuality' => 567,
            'lowQuality' => 341,
            'avgQualityScore' => 72.5,
            'avgCloudSpend' => 34500,
            'techStackMatch' => 78
        ],
        
        'useCaseDistribution' => [
            'Kubernetes' => 420,
            'VMs' => 380,
            'Storage' => 290,
            'Database' => 250,
            'DR/Backup' => 180
        ],
        
        'cloudSpendPotential' => [
            ['range' => '< 10k', 'count' => 120],
            ['range' => '10k-50k', 'count' => 280],
            ['range' => '50k-1L', 'count' => 340],
            ['range' => '1L-5L', 'count' => 180],
            ['range' => '> 5L', 'count' => 90]
        ]
    ];
}

echo json_encode(generateLeadsData($period, $team, $source));
?>