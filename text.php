<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo & Flow Vinyl - 管理後台</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Noto+Sans+TC:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        
        :root {
    --retro-indigo: #2E4057;
    --olive-moss: #7C805E;
    --warm-brass: #D1A65A;
    --beige-mist: #F3EFEA;
    --smoke-violet: #9B8BA8;
    --vinyl-black: #1A1A1A;
    --white: #FFFFFF;
    --light-gray: #F8F6F3;
    --border-color: #d1a65a33;
    --shadow-light: 0 2px 8px #2e405714;
    --shadow-medium: 0 4px 16px #2e40571f;
    --shadow-heavy: 0 8px 32px #2e405729;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Noto Sans TC', sans-serif;
    background: linear-gradient(135deg, var(--beige-mist) 0%, var(--light-gray) 100%);
    color: var(--vinyl-black);
    min-height: 100vh;
    overflow-x: hidden;
}

.container {
    display: flex;
    min-height: 100vh;
    position: relative;
}

/* Mobile Toggle Button */
.mobile-toggle {
    display: none;
    position: fixed;
    top: 1rem;
    left: 1rem;
    z-index: 1001;
    background: var(--vinyl-black);
    color: var(--white);
    border: none;
    padding: 0.75rem;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: var(--shadow-medium);
    transition: all 0.3s ease;
}

.mobile-toggle:hover {
    background: var(--retro-indigo);
    transform: scale(1.05);
}

.mobile-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.mobile-overlay.active {
    opacity: 1;
}

/* Sidebar */
.sidebar {
    width: 280px;
    background: linear-gradient(180deg, var(--vinyl-black) 0%, #0f0f0f 100%);
    color: var(--white);
    padding: 2rem 0;
    box-shadow: 4px 0 20px rgba(26, 26, 26, 0.25);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
    z-index: 1000;
}

.sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 1px;
    height: 100%;
    background: linear-gradient(180deg, transparent 0%, var(--warm-brass) 50%, transparent 100%);
}

.logo {
    text-align: center;
    padding: 0 2rem 2rem;
    border-bottom: 1px solid rgba(209, 166, 90, 0.3);
    margin-bottom: 2rem;
    position: relative;
}

.logo-image {
    max-width: 180px;
    height: auto;
    margin: 0 auto 1rem;
    display: block;
    filter: brightness(1.1);
}

.logo h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--warm-brass);
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    display: none;
}

.logo p {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 300;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 1rem 2rem;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border-left: 3px solid transparent;
}

.nav-item:hover {
    background: rgba(209, 166, 90, 0.15);
    border-left-color: var(--warm-brass);
    color: var(--warm-brass);
    transform: translateX(4px);
}

.nav-item.active {
    background: rgba(209, 166, 90, 0.2);
    border-left-color: var(--warm-brass);
    color: var(--warm-brass);
    transform: translateX(4px);
}

.nav-item i {
    width: 20px;
    margin-right: 1rem;
    font-size: 1.1rem;
}

/* Main Content */
.main-content {
    flex: 1;
    padding: 2rem;
    overflow-y: auto;
    transition: margin-left 0.3s ease;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    padding: 1.5rem 2rem;
    background: var(--white);
    border-radius: 16px;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
    flex-wrap: wrap;
    gap: 1rem;
}

.header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: var(--retro-indigo);
    font-weight: 600;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(45deg, var(--olive-moss), var(--warm-brass));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-weight: 600;
}

/* Stats Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.stat-card {
    background: var(--white);
    padding: 1.8rem;
    border-radius: 16px;
    box-shadow: var(--shadow-light);
    border-left: 4px solid var(--warm-brass);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
}

.stat-card h3 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--retro-indigo);
    margin-bottom: 0.5rem;
}

.stat-card p {
    color: var(--olive-moss);
    font-weight: 500;
    margin-bottom: 0.8rem;
}

.stat-trend {
    font-size: 0.85rem;
    color: var(--warm-brass);
    font-weight: 500;
}

/* Content Sections */
.content-section {
    background: var(--white);
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
    border: 1px solid var(--border-color);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--beige-mist);
    flex-wrap: wrap;
    gap: 1rem;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: var(--retro-indigo);
    font-weight: 600;
}

/* Search and Filter Controls */
.controls-section {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--light-gray);
    border-radius: 12px;
    border: 1px solid var(--border-color);
}

.search-box {
    flex: 1;
    min-width: 250px;
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    border: 2px solid var(--beige-mist);
    border-radius: 8px;
    font-family: inherit;
    transition: all 0.3s ease;
    background: var(--white);
}

.search-box input:focus {
    outline: none;
    border-color: var(--warm-brass);
    box-shadow: 0 0 0 3px rgba(209, 166, 90, 0.1);
}

.search-box i {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--olive-moss);
    cursor: pointer;
    transition: color 0.3s ease;
}

.search-box i:hover {
    color: var(--warm-brass);
}

.filter-group {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}

.filter-group select {
    padding: 0.75rem 1rem;
    border: 2px solid var(--beige-mist);
    border-radius: 8px;
    font-family: inherit;
    background: var(--white);
    min-width: 150px;
    transition: all 0.3s ease;
}

.filter-group select:focus {
    outline: none;
    border-color: var(--warm-brass);
    box-shadow: 0 0 0 3px rgba(209, 166, 90, 0.1);
}

.clear-filters {
    padding: 0.75rem 1.5rem;
    background: var(--smoke-violet);
    color: var(--white);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s ease;
}

.clear-filters:hover {
    background: #8A7A98;
    transform: translateY(-2px);
}

.btn {
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-primary {
    background: linear-gradient(45deg, var(--warm-brass), #E8B968);
    color: var(--white);
    box-shadow: 0 4px 16px rgba(209, 166, 90, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(209, 166, 90, 0.4);
}

.btn-secondary {
    background: var(--olive-moss);
    color: var(--white);
}

.btn-secondary:hover {
    background: #6B6F50;
}

/* Enhanced Table Styles */
.table-container {
    overflow-x: auto;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    background: var(--white);
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
}

.sortable-header {
    cursor: pointer;
    user-select: none;
    position: relative;
    transition: background-color 0.3s ease;
}

.sortable-header:hover {
    background: var(--beige-mist);
}

.sortable-header::after {
    content: '\f0dc';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.3;
    transition: opacity 0.3s ease;
}

.sortable-header:hover::after {
    opacity: 0.6;
}

.sortable-header.sort-asc::after {
    content: '\f0de';
    opacity: 1;
    color: var(--warm-brass);
}

.sortable-header.sort-desc::after {
    content: '\f0dd';
    opacity: 1;
    color: var(--warm-brass);
}

th,
td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--beige-mist);
}

th {
    background: var(--light-gray);
    color: var(--retro-indigo);
    font-weight: 600;
    font-size: 0.9rem;
    position: sticky;
    top: 0;
    z-index: 10;
}

tbody tr {
    transition: background-color 0.3s ease;
}

tbody tr:hover {
    background: rgba(209, 166, 90, 0.05);
}

.no-results {
    text-align: center;
    padding: 3rem;
    color: var(--olive-moss);
    font-style: italic;
}

.no-results i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 2rem 0;
    padding: 1rem;
    flex-wrap: wrap;
}

.pagination-btn {
    padding: 0.6rem 1rem;
    border: 2px solid var(--beige-mist);
    background: var(--white);
    color: var(--retro-indigo);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    min-width: 40px;
    text-align: center;
}

.pagination-btn:hover {
    border-color: var(--warm-brass);
    background: var(--warm-brass);
    color: var(--white);
    transform: translateY(-2px);
}

.pagination-btn.active {
    background: var(--retro-indigo);
    border-color: var(--retro-indigo);
    color: var(--white);
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

.pagination-btn:disabled:hover {
    border-color: var(--beige-mist);
    background: var(--white);
    color: var(--retro-indigo);
}

.pagination-info {
    margin: 0 1rem;
    color: var(--olive-moss);
    font-size: 0.9rem;
    white-space: nowrap;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .controls-section {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-group {
        justify-content: space-between;
    }
}

@media (max-width: 768px) {
    .mobile-toggle {
        display: block;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 280px;
        z-index: 1000;
    }

    .sidebar.open {
        left: 0;
    }

    .main-content {
        padding: 1rem;
        padding-top: 4rem;
        width: 100%;
    }

    .header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .header h2 {
        font-size: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .section-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }

    .controls-section {
        padding: 1rem;
    }

    .search-box {
        min-width: 100%;
    }

    .filter-group {
        flex-direction: column;
        gap: 0.5rem;
    }

    .filter-group select {
        min-width: 100%;
    }

    table {
        min-width: 600px;
    }

    th,
    td {
        padding: 0.5rem;
        font-size: 0.9rem;
    }

    .pagination {
        gap: 0.25rem;
    }

    .pagination-btn {
        padding: 0.5rem 0.75rem;
        min-width: 35px;
    }

    .pagination-info {
        order: -1;
        margin: 0 0 1rem 0;
        text-align: center;
        width: 100%;
    }
}

@media (max-width: 480px) {
    .main-content {
        padding: 0.5rem;
        padding-top: 4rem;
    }

    .content-section {
        padding: 1rem;
    }

    .header {
        padding: 1rem;
    }

    .controls-section {
        padding: 0.75rem;
    }

    .stat-card {
        padding: 1.25rem;
    }

    .stat-card h3 {
        font-size: 1.5rem;
    }

    th,
    td {
        padding: 0.4rem;
        font-size: 0.8rem;
    }

    .btn {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
    }
}

.vinyl-decoration {
    position: absolute;
    top: 15%;
    right: -15px;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--warm-brass) 25%, transparent 26%, transparent 30%, var(--warm-brass) 31%, var(--warm-brass) 35%, transparent 36%);
    opacity: 0.3;
    animation: spin 20s linear infinite;
}

.vinyl-decoration::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 6px;
    height: 6px;
    background: var(--warm-brass);
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

/* Loading animation */
.loading {
    display: none;
    text-align: center;
    padding: 2rem;
    color: var(--olive-moss);
}

.loading.active {
    display: block;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid var(--beige-mist);
    border-top: 4px solid var(--warm-brass);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 1rem;
}
    </style>
</head>

<body>
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="mobile-overlay" onclick="closeSidebar()"></div>

    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="vinyl-decoration"></div>
            <div class="logo">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMjAwIDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMTAgNDBDMTAgNDAgMTUgMzUgMjUgMzVDMzUgMzUgNDAgNDAgNDAgNDBDNDAgNDAgMzUgNDUgMjUgNDVDMTUgNDUgMTAgNDAgMTAgNDBaIiBzdHJva2U9IiNEMUE2NUEiIHN0cm9rZS13aWR0aD0iMiIgZmlsbD0ibm9uZSIvPgo8dGV4dCB4PSI2MCIgeT0iMzAiIGZvbnQtZmFtaWx5PSJzZXJpZiIgZm9udC1zaXplPSIyMCIgZm9udC13ZWlnaHQ9IjQwMCIgZmlsbD0iI0QxQTY1QSI+RWNobyAmPC90ZXh0Pgo8dGV4dCB4PSI2MCIgeT0iNTUiIGZvbnQtZmFtaWx5PSJzZXJpZiIgZm9udC1zaXplPSIyMCIgZm9udC13ZWlnaHQ9IjQwMCIgZmlsbD0iI0QxQTY1QSI+RmxvdzwvdGV4dD4KPHN2Zz4K"
                    alt="Echo & Flow Logo" class="logo-image">
                <h1>Echo & Flow</h1>
                <p>Vinyl Records Co.</p>
            </div>

            <a href="#" class="nav-item active" onclick="showSection('members')">
                <i class="fas fa-users"></i>
                <span>會員管理</span>
            </a>

            <a href="#" class="nav-item" onclick="showSection('products')">
                <i class="fas fa-compact-disc"></i>
                <span>商品管理</span>
            </a>

            <a href="#" class="nav-item" onclick="showSection('secondhand')">
                <i class="fas fa-recycle"></i>
                <span>二手商品管理</span>
            </a>

            <a href="#" class="nav-item" onclick="showSection('coupons')">
                <i class="fas fa-tags"></i>
                <span>優惠券管理</span>
            </a>

            <a href="#" class="nav-item" onclick="showSection('articles')">
                <i class="fas fa-feather-alt"></i>
                <span>文章管理</span>
            </a>

            <a href="#" class="nav-item" onclick="showSection('stores')">
                <i class="fas fa-store-alt"></i>
                <span>店面管理</span>
            </a>

            <div style="margin-top: 2rem; padding: 0 2rem;">
                <div style="border-top: 1px solid rgba(209, 166, 90, 0.3); padding-top: 1rem;">
                    <a href="#" class="nav-item" onclick="showSection('settings')">
                        <i class="fas fa-cog"></i>
                        <span>系統設定</span>
                    </a>
                    <a href="#logout" class="nav-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>登出</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h2 id="page-title">會員管理</h2>
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <span>管理員</span>
                </div>
            </div>

            <!-- Dashboard Section -->
            <div id="dashboard" class="page-section" style="display: none;">
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>1,247</h3>
                        <p>總會員數</p>
                        <div class="stat-trend">↗ +12% 本月</div>
                    </div>
                    <div class="stat-card">
                        <h3>856</h3>
                        <p>在售商品</p>
                        <div class="stat-trend">↗ +5% 本週</div>
                    </div>
                    <div class="stat-card">
                        <h3>124</h3>
                        <p>二手商品</p>
                        <div class="stat-trend">↗ +18% 本月</div>
                    </div>
                    <div class="stat-card">
                        <h3>NT$ 127,500</h3>
                        <p>本月營收</p>
                        <div class="stat-trend">↗ +24% 較上月</div>
                    </div>
                </div>
            </div>

            <!-- Members Section -->
            <div id="members" class="page-section">
                <div class="content-section">
                    <div class="section-header">
                        <h3 class="section-title">會員管理</h3>
                        <a href="#" class="btn btn-primary">新增會員</a>
                    </div>

                    <div class="controls-section">
                        <div class="search-box">
                            <input type="text" id="memberSearch" placeholder="搜尋會員姓名、Email或編號..."
                                onkeyup="searchMembers()">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="filter-group">
                            <select id="levelFilter" onchange="filterMembers()">
                                <option value="">全部等級</option>
                                <option value="一般會員">一般會員</option>
                                <option value="VIP會員">VIP會員</option>
                                <option value="黑膠收藏家">黑膠收藏家</option>
                            </select>
                            <select id="dateFilter" onchange="filterMembers()">
                                <option value="">註冊時間</option>
                                <option value="recent">近30天</option>
                                <option value="month">近3個月</option>
                                <option value="year">近一年</option>
                            </select>
                            <button class="clear-filters" onclick="clearFilters()">清除篩選</button>
                        </div>
                    </div>

                    <div class="loading" id="loadingMembers">
                        <div class="spinner"></div>
                        <p>載入中...</p>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th class="sortable-header" onclick="sortTable('members', 'id')">會員編號</th>
                                    <th class="sortable-header" onclick="sortTable('members', 'name')">姓名</th>
                                    <th class="sortable-header" onclick="sortTable('members', 'email')">Email</th>
                                    <th class="sortable-header" onclick="sortTable('members', 'level')">等級</th>
                                    <th class="sortable-header" onclick="sortTable('members', 'date')">註冊日期</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody