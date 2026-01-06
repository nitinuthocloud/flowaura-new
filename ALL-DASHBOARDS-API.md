# Complete CRM Dashboards API Documentation

This document contains all API endpoints, methods, payloads, and responses for all static dashboards.

---

## Table of Contents
1. [Sales Dashboard API](#1-sales-dashboard-api)
2. [Leads Dashboard API](#2-leads-dashboard-api)
3. [Account Management Dashboard API](#3-account-management-dashboard-api)
4. [Support Dashboard API](#4-support-dashboard-api)
5. [Billing Dashboard API](#5-billing-dashboard-api)

---

## 1. Sales Dashboard API

**File:** `static-sales-dashboard.html`  
**Endpoint:** `sales-api.php`  
**Method:** `GET`

### Request
```javascript
fetch('sales-api.php')
```

### Response
```json
{
  "followUpTasks": [
    {
      "id": "uuid",
      "name": "Rohan Sharma",
      "company": "Cloud Ventures",
      "task": "Cloud Migration Discussion",
      "type": "Call",
      "time": "2:45 PM",
      "status": "Done"
    }
  ],
  "kpis": {
    "totalAllocated": "₹ 68.02L",
    "contactedHot": "₹ 45.3K",
    "dealsInPipe": "₹ 32.5L",
    "expectedValue": "₹ 125.8L",
    "newMeetings": "1,247",
    "leadQualified": "342",
    "newLeads": "89",
    "coldCalling": "523",
    "followUp": "156",
    "proposalsSent": "78",
    "dealsLost": "23",
    "dealsWon": "45"
  },
  "leadStatus": {
    "newLeads": 89,
    "hotLeads": 523,
    "activeDeals": 234,
    "lostDeals": 83,
    "qualified": 234,
    "unresponsive": 156
  },
  "pipeline": {
    "stages": [
      {
        "name": "New",
        "count": 7,
        "value": "₹ 2.8L",
        "deals": [
          {
            "id": "uuid",
            "name": "Cloud Migration",
            "company": "CloudTechies",
            "value": "₹ 1.8L",
            "rep": "TRM"
          }
        ]
      },
      { "name": "Contacted", "count": 12, "value": "₹ 4.5L", "deals": [] },
      { "name": "Qualified", "count": 8, "value": "₹ 6.2L", "deals": [] },
      { "name": "Proposal", "count": 5, "value": "₹ 8.1L", "deals": [] },
      { "name": "Negotiation", "count": 3, "value": "₹ 3.2L", "deals": [] }
    ]
  },
  "recentActivity": [
    {
      "id": "uuid",
      "user": "Latif",
      "description": "added EMC Corp deal worth ₹2.5L to the pipeline",
      "details": "",
      "time": "2 hours ago",
      "type": "deal"
    }
  ],
  "salesTargets": [
    {
      "id": "uuid",
      "rep": "TRM",
      "quarter": "Q4",
      "month": "October",
      "targetBusiness": "₹ 7.16Lk",
      "achievedRevenue": "₹ 6.23Lk",
      "targetMRR": "₹ 4.40K",
      "achievedMRR": "₹ 3.53K",
      "achievement": "87%",
      "status": "On Track"
    }
  ]
}
```

---

## 2. Leads Dashboard API

**File:** `static-leads-dashboard.html`  
**Endpoint:** `leads-api.php`  
**Method:** `GET`

### Request
```javascript
fetch('leads-api.php')
```

### Response
```json
{
  "statusDistribution": [
    {
      "status": "Not Called",
      "count": 245,
      "percentage": 18.5
    },
    {
      "status": "Invalid Number",
      "count": 89,
      "percentage": 6.7
    },
    {
      "status": "Called – No Answer",
      "count": 178,
      "percentage": 13.4
    },
    {
      "status": "Called – Not Interested",
      "count": 112,
      "percentage": 8.4
    },
    {
      "status": "Meeting Scheduled",
      "count": 156,
      "percentage": 11.7
    },
    {
      "status": "Follow-up Required",
      "count": 203,
      "percentage": 15.3
    },
    {
      "status": "Do Not Call",
      "count": 34,
      "percentage": 2.6
    },
    {
      "status": "Callback Requested",
      "count": 67,
      "percentage": 5.0
    },
    {
      "status": "No Longer at Company",
      "count": 45,
      "percentage": 3.4
    },
    {
      "status": "Sent Information – Awaiting",
      "count": 89,
      "percentage": 6.7
    },
    {
      "status": "In Lock-In",
      "count": 56,
      "percentage": 4.2
    },
    {
      "status": "Wrong Details",
      "count": 28,
      "percentage": 2.1
    },
    {
      "status": "Disconnect",
      "count": 27,
      "percentage": 2.0
    }
  ],
  "teamPerformance": [
    {
      "name": "Amit Kumar",
      "team": "Inbound",
      "assigned": 145,
      "calls": 320,
      "connected": 89,
      "meetings": 23,
      "qualified": 18,
      "conversion": 6.2
    },
    {
      "name": "Priya Singh",
      "team": "Outbound",
      "assigned": 180,
      "calls": 450,
      "connected": 112,
      "meetings": 28,
      "qualified": 22,
      "conversion": 4.9
    }
  ],
  "followUpTasks": [
    {
      "lead": "Rahul Verma",
      "type": "Call",
      "dueDate": "Today, 2:30 PM",
      "lastAction": "Email sent 2 days ago",
      "owner": "Amit Kumar",
      "status": "Due",
      "priority": "High"
    },
    {
      "lead": "Sneha Patel",
      "type": "Meeting",
      "dueDate": "Tomorrow, 10:00 AM",
      "lastAction": "Demo scheduled",
      "owner": "Priya Singh",
      "status": "Upcoming",
      "priority": "Medium"
    }
  ],
  "leadDatabase": [
    {
      "name": "Rajesh Kumar",
      "email": "rajesh@techcorp.com",
      "phone": "+91 98765 43210",
      "company": "TechCorp Solutions",
      "source": "Website",
      "status": "Meeting Scheduled",
      "owner": "Amit Kumar",
      "quality": "High",
      "useCase": "Kubernetes",
      "lastActivity": "2 hours ago"
    },
    {
      "name": "Priya Sharma",
      "email": "priya@dataflow.io",
      "phone": "+91 87654 32109",
      "company": "DataFlow Systems",
      "source": "LinkedIn",
      "status": "Follow-up Required",
      "owner": "Priya Singh",
      "quality": "Medium",
      "useCase": "Database",
      "lastActivity": "1 day ago"
    }
  ],
  "inboundKpis": {
    "totalLeads": 845,
    "hotLeads": 773,
    "connected": 688,
    "demos": 254,
    "trial": 142,
    "converted": 89
  },
  "outboundKpis": {
    "apolloData": 2450,
    "emailsSent": 1890,
    "coldCalls": 1245,
    "connected": 456,
    "meetings": 89,
    "converted": 34
  },
  "qualityMetrics": {
    "excellent": 0,
    "good": 0,
    "fair": 0,
    "avgCloudSpend": "34.5k",
    "techStackMatch": "78%"
  }
}
```

### Status Values (Lead Status)
- Not Called
- Invalid Number
- Called – No Answer
- Called – Not Interested
- Meeting Scheduled
- Follow-up Required
- Do Not Call
- Callback Requested
- No Longer at Company
- Sent Information – Awaiting
- In Lock-In
- Wrong Details
- Disconnect

---

## 3. Account Management Dashboard API

**File:** `static-account-management-dashboard.html`  
**Endpoint:** `account-management-api.php`  
**Method:** `GET`

### Request
```javascript
fetch('account-management-api.php')
```

### Response
```json
{
  "kpis": {
    "totalAccounts": 147,
    "totalMRR": "₹42.8L",
    "renewalsDue": 23,
    "atRiskAccounts": 9,
    "avgHealthScore": 78,
    "nps": 42
  },
  "healthDistribution": {
    "healthy": 85,
    "watchlist": 34,
    "atRisk": 19,
    "critical": 9
  },
  "atRiskAccounts": [
    {
      "id": "uuid",
      "company": "TechVision Corp",
      "mrr": "₹2.4L",
      "healthScore": 32,
      "riskLevel": "Critical",
      "renewalDate": "2024-02-15",
      "riskReasons": ["Payment delays", "Low usage", "Support escalations"],
      "csm": "Neha Mehta",
      "lastContact": "5 days ago"
    }
  ],
  "renewals": [
    {
      "id": "uuid",
      "company": "CloudBase Solutions",
      "mrr": "₹1.8L",
      "renewalDate": "2024-02-01",
      "status": "In Progress",
      "probability": 85,
      "csm": "Rajesh Kr"
    }
  ],
  "portfolioAccounts": [
    {
      "id": "uuid",
      "company": "Delta Systems",
      "type": "Enterprise",
      "mrr": "₹3.2L",
      "healthScore": 92,
      "products": ["VMs", "K8s", "Storage"],
      "renewalDate": "2024-06-15",
      "csm": "Amit Patel",
      "lastQbr": "2024-01-10"
    }
  ],
  "mrrTrend": {
    "labels": ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    "existingMRR": [38, 39, 40, 41, 42, 42.8],
    "collectionMRR": [36, 37, 38, 39, 40, 41]
  },
  "followUpTasks": [
    {
      "id": "uuid",
      "task": "QBR Review",
      "account": "Beta Solutions",
      "dueDate": "Today",
      "priority": "High",
      "type": "QBR"
    }
  ],
  "recentActivity": [
    {
      "type": "qbr",
      "title": "QBR Completed",
      "description": "Beta Solutions reviewed all goals and KPIs",
      "time": "9 minutes ago",
      "user": "You"
    },
    {
      "type": "upsell",
      "title": "Upsell achieved",
      "description": "Deals with a double their K8s unit + 5 DB add-on",
      "time": "5 minutes ago",
      "user": "Amit Patel"
    },
    {
      "type": "churn",
      "title": "Churn alert: Budget cuts",
      "description": "Epsilon Infotech did not renew",
      "time": "1 day ago",
      "user": "Rajesh Kr",
      "status": "Lost"
    }
  ]
}
```

---

## 4. Support Dashboard API

**File:** `static-support-dashboard.html`  
**Endpoint:** `support-api.php`  
**Method:** `GET`

### Request
```javascript
fetch('support-api.php')
```

### Response
```json
{
  "kpis": {
    "openTickets": 152,
    "avgFRT": "8 min",
    "avgResolutionTime": "2.4 hrs",
    "csatScore": 4.6,
    "slaCompliance": "94.2%",
    "reopenRate": "3.8%"
  },
  "ticketStatus": {
    "new": 12,
    "inProgress": 34,
    "waitingCustomer": 18,
    "resolved": 76,
    "closed": 8,
    "reopened": 4
  },
  "reopenReasons": {
    "labels": ["Incomplete Fix", "Root Cause", "Bad Comm", "Customer", "Alert"],
    "values": [5, 3, 2, 1, 1]
  },
  "agentScorecards": [
    {
      "id": "uuid",
      "name": "Rajesh Kumar",
      "role": "Senior Support Engineer",
      "score": 92,
      "avgAllocationTime": "5 min",
      "avgFRT": "7 min",
      "avgResolutionTime": "2.1 hrs",
      "ticketsHandled": 45,
      "ticketsResolved": 42,
      "reopenRate": "2.1%",
      "slaBreach": 1,
      "csat": 4.8,
      "signals": ["Fast responder", "High quality"],
      "signalType": "positive"
    },
    {
      "id": "uuid",
      "name": "Priya Singh",
      "role": "Support Engineer",
      "score": 72,
      "avgAllocationTime": "12 min",
      "avgFRT": "15 min",
      "avgResolutionTime": "3.2 hrs",
      "ticketsHandled": 38,
      "ticketsResolved": 32,
      "reopenRate": "8.3%",
      "slaBreach": 4,
      "csat": 4.2,
      "signals": ["Needs coaching on resolution quality"],
      "signalType": "warning"
    },
    {
      "id": "uuid",
      "name": "Amit Patel",
      "role": "Support Engineer",
      "score": 55,
      "avgAllocationTime": "25 min",
      "avgFRT": "22 min",
      "avgResolutionTime": "4.8 hrs",
      "ticketsHandled": 28,
      "ticketsResolved": 20,
      "reopenRate": "14.3%",
      "slaBreach": 8,
      "csat": 3.6,
      "signals": ["Slow to pick up tickets", "High reopen rate"],
      "signalType": "critical"
    }
  ],
  "agentComparison": [
    { "name": "Rajesh K", "score": 92, "resolutionTime": 2.1 },
    { "name": "Priya S", "score": 72, "resolutionTime": 3.2 },
    { "name": "Amit P", "score": 55, "resolutionTime": 4.8 },
    { "name": "Sneha V", "score": 85, "resolutionTime": 2.3 }
  ],
  "tickets": [
    {
      "id": "TKT-2024-001",
      "subject": "VM connectivity issue",
      "customer": "TechCorp Solutions",
      "severity": "High",
      "status": "In Progress",
      "sla": "Within SLA",
      "assignee": "Rajesh Kumar",
      "category": "Infrastructure",
      "createdAt": "2024-03-15 09:30",
      "age": "4h 15m"
    }
  ],
  "shiftHandover": {
    "pendingTickets": 12,
    "criticalIssues": 2,
    "notes": "K8s cluster issue ongoing for CloudBase - priority escalation",
    "previousShift": "Morning (6AM-2PM)",
    "handoverBy": "Sneha Verma"
  },
  "slaMetrics": {
    "frtTrend": {
      "labels": ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      "values": [10, 9, 8, 7, 8, 9, 7]
    },
    "resolutionTrend": {
      "labels": ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      "values": [3.2, 2.9, 2.7, 2.5, 2.4, 2.6, 2.3]
    },
    "complianceTrend": {
      "labels": ["Week 1", "Week 2", "Week 3", "Week 4"],
      "values": [92, 93, 94, 95]
    }
  }
}
```

---

## 5. Billing Dashboard API

**File:** `static-billing-dashboard.html`  
**Endpoint:** `billing-api.php`  
**Method:** `GET`

### Request
```javascript
fetch('billing-api.php')
```

### Response
```json
{
  "kpis": {
    "totalInvoiced": "₹ 45.8L",
    "totalCollected": "₹ 42.3L",
    "collectionEfficiency": "92.4%",
    "pendingReceivables": "₹ 3.5L",
    "overdueAmount": "₹ 1.2L",
    "refundsIssued": "₹ 45K",
    "netRevenue": "₹ 41.85L",
    "gstCollected": "₹ 7.6L"
  },
  "overdueDetails": [
    {
      "invoiceDate": "2024-01-15",
      "customer": "TechVision Corp",
      "type": "Enterprise",
      "typeClass": "primary",
      "invoiceNo": "INV-2024-0156",
      "dueDate": "2024-02-15",
      "amount": "1,25,000",
      "paid": "0",
      "outstanding": "1,25,000",
      "daysOverdue": 28,
      "status": "Overdue",
      "statusClass": "danger"
    }
  ],
  "agingBuckets": [
    { "label": "0-30 days", "amount": "2.5", "color": "#10b981" },
    { "label": "31-60 days", "amount": "1.8", "color": "#f59e0b" },
    { "label": "61-90 days", "amount": "0.9", "color": "#f97316" },
    { "label": "> 90 days", "amount": "0.4", "color": "#ef4444" }
  ],
  "refundDetails": [
    {
      "date": "2024-03-10",
      "customer": "DataFlow Systems",
      "invoiceNo": "INV-2024-0089",
      "refundId": "REF-2024-0012",
      "amount": "15,000",
      "reason": "Service Issue",
      "processedBy": "Amit Kumar",
      "status": "Completed",
      "statusClass": "success"
    }
  ],
  "refundMetrics": {
    "totalRefunds": "₹ 45K",
    "refundCount": 12,
    "avgProcessingTime": "2.3 days",
    "reasons": {
      "labels": ["Service Issue", "Billing Error", "Duplicate", "Cancellation", "Other"],
      "values": [5, 3, 2, 1, 1]
    }
  },
  "gstDetails": [
    {
      "invoiceNo": "INV-2024-0156",
      "customer": "TechVision Corp",
      "type": "Registered",
      "typeClass": "success",
      "placeOfSupply": "Maharashtra",
      "taxableValue": "1,05,932",
      "cgst": "9,534",
      "sgst": "9,534",
      "igst": "0",
      "category": "Intra-State"
    },
    {
      "invoiceNo": "INV-2024-0157",
      "customer": "CloudBase Ltd",
      "type": "Registered",
      "typeClass": "success",
      "placeOfSupply": "Karnataka",
      "taxableValue": "85,000",
      "cgst": "0",
      "sgst": "0",
      "igst": "15,300",
      "category": "Inter-State"
    },
    {
      "invoiceNo": "INV-2024-0158",
      "customer": "Global Tech Inc",
      "type": "Overseas",
      "typeClass": "info",
      "placeOfSupply": "USA",
      "taxableValue": "2,50,000",
      "cgst": "0",
      "sgst": "0",
      "igst": "0",
      "category": "Export"
    }
  ],
  "customerHealth": [
    {
      "name": "TechVision Corp",
      "mrr": "2.4L",
      "healthScore": 45,
      "avgDelay": 18,
      "totalOverdues": "1.25L",
      "refundCount": 2,
      "riskLevel": "High Risk",
      "riskClass": "danger"
    },
    {
      "name": "CloudBase Ltd",
      "mrr": "1.8L",
      "healthScore": 82,
      "avgDelay": 3,
      "totalOverdues": "0",
      "refundCount": 0,
      "riskLevel": "Low Risk",
      "riskClass": "success"
    }
  ],
  "teamPerformance": [
    {
      "name": "Sneha Gupta",
      "invoices": 45,
      "amount": "12.5L",
      "collections": "11.8L",
      "reminders": 23,
      "refunds": 2,
      "errors": 1,
      "invoiceTime": "1.2",
      "paymentTime": "8.5"
    }
  ],
  "alerts": [
    {
      "title": "High Overdue Alert",
      "description": "TechVision Corp has ₹1.25L overdue for 28+ days",
      "severity": "High",
      "action": "Send Reminder"
    },
    {
      "title": "GST Filing Due",
      "description": "GSTR-3B for March due in 5 days",
      "severity": "Medium",
      "action": "Review Returns"
    }
  ],
  "salesVsCollection": {
    "labels": ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    "invoiced": [42, 45, 48, 44, 46, 45.8],
    "collected": [40, 43, 45, 42, 44, 42.3],
    "pending": [2, 2, 3, 2, 2, 3.5]
  },
  "productRevenue": {
    "labels": ["VMs", "Kubernetes", "Storage", "Database", "DR/Backup"],
    "invoiced": [18, 12, 8, 5, 2.8],
    "collected": [17, 11, 7.5, 4.5, 2.3]
  }
}
```

---

## PHP API Template

Each API endpoint should follow this template:

```php
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Database connection (optional)
// $conn = new mysqli('localhost', 'username', 'password', 'database');

$response = [
    // Add your data here based on the response structure above
];

echo json_encode($response);
?>
```

---

## Error Response Format

All APIs should return errors in this format:

```json
{
  "error": true,
  "message": "Error description",
  "code": 400
}
```

**HTTP Status Codes:**
- `200` - Success
- `400` - Bad Request
- `401` - Unauthorized
- `404` - Not Found
- `500` - Server Error
