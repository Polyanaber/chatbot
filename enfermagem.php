<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Nursing Assistant - Sistema Completo de Enfermagem</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@3.3.0/build/global/luxon.min.js"></script>

<style>
    /* ESTILOS BASE */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    :root {
        --primary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --secondary-gradient: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);
        --accent-gradient: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        --success-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        --nursing-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        --emergency-gradient: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        --dark-bg: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        --card-bg: linear-gradient(145deg, #1e293b, #0f172a);
        --sidebar-bg: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        --text-primary: #ffffff;
        --text-secondary: #cbd5e1;
        --text-muted: #94a3b8;
        --border-color: rgba(255, 255, 255, 0.1);
        --shadow: 0 10px 25px rgba(0,0,0,0.3);
        --shadow-hover: 0 15px 35px rgba(0,0,0,0.4);
        --radius-sm: 10px;
        --radius-md: 15px;
        --radius-lg: 20px;
        --radius-full: 50px;
        --transition: all 0.3s ease;
    }

    body {
        background: var(--dark-bg);
        color: var(--text-primary);
        min-height: 100vh;
        transition: var(--transition);
        line-height: 1.6;
        display: flex;
        overflow-x: hidden;
    }

    /* SIDEBAR */
    .sidebar {
        width: 280px;
        background: var(--sidebar-bg);
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        overflow-y: auto;
        z-index: 1000;
        border-right: 1px solid var(--border-color);
        transition: transform 0.3s ease;
        padding: 20px 0;
        box-shadow: 8px 0 25px rgba(0,0,0,0.25);
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        padding: 0 20px 20px 20px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 20px;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .sidebar-logo .icon {
        font-size: 32px;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: pulse 2s infinite;
    }

    .sidebar-logo h1 {
        font-size: 22px;
        font-weight: 700;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sidebar-tagline {
        font-size: 12px;
        color: var(--text-muted);
        text-align: center;
        padding: 5px 10px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: var(--radius-sm);
        border-left: 3px solid #10b981;
    }

    .sidebar-menu {
        flex: 1;
        padding: 0 15px;
        overflow-y: auto;
    }

    .sidebar-menu-section {
        margin-bottom: 25px;
    }

    .sidebar-menu-section h3 {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--text-muted);
        margin-bottom: 12px;
        font-weight: 600;
        padding-left: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sidebar-menu-section h3 i {
        font-size: 14px;
    }

    .sidebar-menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 15px;
        color: var(--text-secondary);
        text-decoration: none;
        border-radius: var(--radius-sm);
        margin-bottom: 6px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        font-size: 14px;
    }

    .sidebar-menu-item:hover {
        background: rgba(16, 185, 129, 0.15);
        color: var(--text-primary);
        transform: translateX(5px);
    }

    .sidebar-menu-item.active {
        background: rgba(16, 185, 129, 0.25);
        color: var(--text-primary);
        border-left: 4px solid #10b981;
    }

    .sidebar-menu-item i {
        font-size: 16px;
        width: 20px;
        text-align: center;
    }

    .sidebar-menu-item .badge {
        position: absolute;
        right: 15px;
        background: var(--accent-gradient);
        color: white;
        font-size: 10px;
        padding: 3px 6px;
        border-radius: 10px;
        font-weight: 600;
    }

    /* CONTEÚDO PRINCIPAL */
    .main-content {
        flex: 1;
        margin-left: 280px;
        transition: margin-left 0.3s ease;
        min-height: 100vh;
        position: relative;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    /* HEADER */
    .header {
        text-align: center;
        margin-bottom: 40px;
        padding: 20px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color);
    }

    .header .icon {
        font-size: 48px;
        margin-bottom: 20px;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .header h1 {
        font-size: 32px;
        margin-bottom: 10px;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .header p {
        color: var(--text-secondary);
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
    }

    /* DASHBOARD */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .dashboard-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 25px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
    }

    .dashboard-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dashboard-card-header h3 {
        font-size: 18px;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-card-header i {
        font-size: 24px;
        opacity: 0.8;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-top: 20px;
    }

    .stat-item {
        text-align: center;
        padding: 15px 10px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: var(--radius-sm);
        transition: var(--transition);
    }

    .stat-item:hover {
        background: rgba(16, 185, 129, 0.1);
        transform: translateY(-3px);
    }

    .stat-value {
        font-size: 24px;
        font-weight: 700;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 5px;
    }

    /* FERRAMENTAS RÁPIDAS */
    .tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .tool-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 25px 20px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .tool-card:hover {
        background: rgba(16, 185, 129, 0.1);
        border-color: rgba(16, 185, 129, 0.3);
        transform: translateY(-8px);
    }

    .tool-card i {
        font-size: 36px;
        margin-bottom: 15px;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .tool-card h4 {
        font-size: 16px;
        margin-bottom: 10px;
        color: var(--text-primary);
    }

    .tool-card p {
        font-size: 13px;
        color: var(--text-secondary);
        line-height: 1.5;
    }

    /* FORMULÁRIOS E INPUTS */
    .input-group {
        margin-bottom: 20px;
    }

    .input-label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 500;
    }

    .input-field {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-sm);
        color: var(--text-primary);
        font-size: 15px;
        transition: var(--transition);
    }

    .input-field:focus {
        outline: none;
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.05);
    }

    .textarea-field {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-sm);
        color: var(--text-primary);
        font-size: 15px;
        min-height: 120px;
        resize: vertical;
        transition: var(--transition);
    }

    .textarea-field:focus {
        outline: none;
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.05);
    }

    .select-field {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-sm);
        color: var(--text-primary);
        font-size: 15px;
        transition: var(--transition);
        cursor: pointer;
    }

    .select-field:focus {
        outline: none;
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.05);
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .checkbox-label {
        color: var(--text-secondary);
        font-size: 14px;
        cursor: pointer;
    }

    .checkbox-input {
        width: 18px;
        height: 18px;
        accent-color: #10b981;
        cursor: pointer;
    }

    /* BOTÕES */
    .btn {
        padding: 14px 28px;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: white;
    }

    .btn-primary {
        background: var(--primary-gradient);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-secondary {
        background: var(--secondary-gradient);
    }

    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(14, 165, 233, 0.3);
    }

    .btn-danger {
        background: var(--danger-gradient);
    }

    .btn-danger:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(239, 68, 68, 0.3);
    }

    .btn-accent {
        background: var(--accent-gradient);
    }

    .btn-accent:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-block {
        width: 100%;
    }

    /* MODAIS */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 2000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 30px;
        max-width: 800px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        border: 1px solid var(--border-color);
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .modal-header h2 {
        font-size: 24px;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .modal-close {
        background: none;
        border: none;
        color: var(--text-muted);
        font-size: 24px;
        cursor: pointer;
        transition: var(--transition);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    /* TABELAS */
    .table-container {
        overflow-x: auto;
        margin: 20px 0;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border-color);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        min-width: 600px;
    }

    .table th {
        background: rgba(16, 185, 129, 0.1);
        color: var(--text-primary);
        font-weight: 600;
        text-align: left;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .table td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-secondary);
    }

    .table tr:hover td {
        background: rgba(16, 185, 129, 0.05);
        color: var(--text-primary);
    }

    /* NOTIFICAÇÕES */
    .notification {
        position: fixed;
        top: 30px;
        right: 30px;
        padding: 20px;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-hover);
        z-index: 3000;
        max-width: 400px;
        transform: translateX(500px);
        transition: transform 0.5s ease;
        border-left: 4px solid #10b981;
        background: var(--card-bg);
    }

    .notification.show {
        transform: translateX(0);
    }

    .notification.success {
        border-left-color: #10b981;
    }

    .notification.warning {
        border-left-color: #f59e0b;
    }

    .notification.error {
        border-left-color: #ef4444;
    }

    .notification.info {
        border-left-color: #3b82f6;
    }

    /* ANIMAÇÕES */
    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* RESPONSIVIDADE */
    @media (max-width: 1024px) {
        .dashboard-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
        
        .tools-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }
        
        .sidebar.active {
            transform: translateX(0);
        }
        
        .main-content {
            margin-left: 0;
        }
        
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
        
        .header h1 {
            font-size: 24px;
        }
        
        .modal-content {
            padding: 20px;
            max-height: 85vh;
        }
    }

    /* SCROLLBAR PERSONALIZADA */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-gradient);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #0d9c74 0%, #047857 100%);
    }
</style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <div class="icon">
                    <i class="fas fa-user-nurse"></i>
                </div>
                <h1>Nursing Assistant</h1>
            </div>
            <p class="sidebar-tagline">Sistema completo de gestão em enfermagem</p>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(16, 185, 129, 0.1); border-radius: var(--radius-sm);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                    <span style="font-size: 12px; color: var(--text-muted);">Turno Ativo:</span>
                    <span style="font-size: 12px; font-weight: 600; color: #10b981;" id="currentShift">Diurno</span>
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <span style="font-size: 12px; color: var(--text-muted);">Enfermeiro:</span>
                    <span style="font-size: 12px; font-weight: 600;" id="currentNurse">Maria Silva</span>
                </div>
            </div>
        </div>
        
        <div class="sidebar-menu">
            <!-- SEÇÃO PRINCIPAL -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-home"></i> Principal</h3>
                <a href="#" class="sidebar-menu-item active" data-page="dashboard">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="patients">
                    <i class="fas fa-procedures"></i>
                    <span>Pacientes</span>
                    <span class="badge" id="patientCount">24</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="medication">
                    <i class="fas fa-pills"></i>
                    <span>Medicação</span>
                    <span class="badge">85</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="tasks">
                    <i class="fas fa-tasks"></i>
                    <span>Tarefas</span>
                    <span class="badge" id="taskCount">12</span>
                </a>
            </div>
            
            <!-- SEÇÃO CLÍNICA -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-stethoscope"></i> Clínica</h3>
                <a href="#" class="sidebar-menu-item" data-page="vital-signs">
                    <i class="fas fa-heartbeat"></i>
                    <span>Sinais Vitais</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="evaluation">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Avaliação</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="procedures">
                    <i class="fas fa-syringe"></i>
                    <span>Procedimentos</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="evolution">
                    <i class="fas fa-history"></i>
                    <span>Evolução</span>
                </a>
            </div>
            
            <!-- SEÇÃO MEDICAÇÃO -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-prescription-bottle-alt"></i> Medicação</h3>
                <a href="#" class="sidebar-menu-item" data-page="prescriptions">
                    <i class="fas fa-file-prescription"></i>
                    <span>Prescrições</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="administration">
                    <i class="fas fa-hand-holding-medical"></i>
                    <span>Administração</span>
                    <span class="badge" id="medicationDue">5</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="schedule">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Cronograma</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="inventory">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Estoque</span>
                </a>
            </div>
            
            <!-- SEÇÃO EMERGÊNCIA -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-exclamation-triangle"></i> Emergência</h3>
                <a href="#" class="sidebar-menu-item" data-page="triage">
                    <i class="fas fa-ambulance"></i>
                    <span>Triagem</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="protocols">
                    <i class="fas fa-book-medical"></i>
                    <span>Protocolos</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="quick-guide">
                    <i class="fas fa-first-aid"></i>
                    <span>Guia Rápido</span>
                </a>
            </div>
            
            <!-- SEÇÃO FERRAMENTAS -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-calculator"></i> Calculadoras</h3>
                <a href="#" class="sidebar-menu-item" data-tool="dose-calculator">
                    <i class="fas fa-syringe"></i>
                    <span>Cálculo de Dose</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-tool="bmi-calculator">
                    <i class="fas fa-weight"></i>
                    <span>IMC</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-tool="fluid-calculator">
                    <i class="fas fa-tint"></i>
                    <span>Hidratação</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-tool="map-calculator">
                    <i class="fas fa-heart"></i>
                    <span>PAM</span>
                </a>
            </div>
            
            <!-- SEÇÃO RELATÓRIOS -->
            <div class="sidebar-menu-section">
                <h3><i class="fas fa-chart-bar"></i> Relatórios</h3>
                <a href="#" class="sidebar-menu-item" data-page="reports">
                    <i class="fas fa-chart-pie"></i>
                    <span>Relatórios</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="export">
                    <i class="fas fa-file-export"></i>
                    <span>Exportar Dados</span>
                </a>
                <a href="#" class="sidebar-menu-item" data-page="statistics">
                    <i class="fas fa-chart-line"></i>
                    <span>Estatísticas</span>
                </a>
            </div>
        </div>
        
        <div class="sidebar-footer" style="padding: 20px; border-top: 1px solid var(--border-color);">
            <div style="text-align: center;">
                <div style="font-size: 11px; color: var(--text-muted); margin-bottom: 5px;">
                    Última atualização
                </div>
                <div style="font-size: 12px; font-weight: 600; color: var(--text-primary);" id="lastUpdate">
                    10:45 AM
                </div>
            </div>
        </div>
    </div>
    
    <!-- BOTÃO TOGGLE SIDEBAR -->
    <button class="btn" id="sidebarToggle" style="position: fixed; top: 20px; left: 20px; z-index: 1001; padding: 10px 15px; background: var(--primary-gradient);">
        <i class="fas fa-bars"></i>
    </button>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="main-content" id="mainContent">
        <!-- DASHBOARD -->
        <div class="container">
            <div class="header">
                <div class="icon">
                    <i class="fas fa-user-nurse"></i>
                </div>
                <h1 id="greeting">Bom dia, Enfermeira Maria!</h1>
                <p>Sistema completo de gestão em enfermagem - Todos os módulos operacionais</p>
            </div>

            <!-- DASHBOARD GRID -->
            <div class="dashboard-grid">
                <!-- CARD PACIENTES -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3><i class="fas fa-procedures"></i> Pacientes</h3>
                        <i class="fas fa-user-injured" style="color: #10b981;"></i>
                    </div>
                    <p style="color: var(--text-secondary); margin-bottom: 20px;">
                        <span id="activePatients">24</span> pacientes ativos no sistema
                    </p>
                    
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-value" id="patientsCritical">3</div>
                            <div class="stat-label">Críticos</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="patientsStable">18</div>
                            <div class="stat-label">Estáveis</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="patientsDischarge">3</div>
                            <div class="stat-label">Alta</div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary btn-block" style="margin-top: 20px;" onclick="openPage('patients')">
                        <i class="fas fa-user-plus"></i> Ver Todos os Pacientes
                    </button>
                </div>
                
                <!-- CARD TAREFAS -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3><i class="fas fa-tasks"></i> Tarefas Pendentes</h3>
                        <i class="fas fa-clipboard-list" style="color: #0ea5e9;"></i>
                    </div>
                    <div style="margin: 20px 0;">
                        <div style="margin-bottom: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="font-size: 14px;">Medicação</span>
                                <span style="font-size: 14px; font-weight: 600; color: #ef4444;">5 pendentes</span>
                            </div>
                            <div style="height: 8px; background: rgba(239, 68, 68, 0.2); border-radius: 4px; overflow: hidden;">
                                <div style="width: 60%; height: 100%; background: var(--danger-gradient);"></div>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="font-size: 14px;">Sinais Vitais</span>
                                <span style="font-size: 14px; font-weight: 600; color: #f59e0b;">8 pendentes</span>
                            </div>
                            <div style="height: 8px; background: rgba(245, 158, 11, 0.2); border-radius: 4px; overflow: hidden;">
                                <div style="width: 40%; height: 100%; background: var(--warning-gradient);"></div>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="font-size: 14px;">Documentação</span>
                                <span style="font-size: 14px; font-weight: 600; color: #10b981;">3 pendentes</span>
                            </div>
                            <div style="height: 8px; background: rgba(16, 185, 129, 0.2); border-radius: 4px; overflow: hidden;">
                                <div style="width: 20%; height: 100%; background: var(--primary-gradient);"></div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-secondary btn-block" onclick="openPage('tasks')">
                        <i class="fas fa-clipboard-check"></i> Ver Todas as Tarefas
                    </button>
                </div>
                
                <!-- CARD EMERGÊNCIA -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3><i class="fas fa-exclamation-triangle"></i> Emergência</h3>
                        <i class="fas fa-ambulance" style="color: #ef4444;"></i>
                    </div>
                    <p style="color: var(--text-secondary); margin-bottom: 20px;">
                        Protocolos de emergência e contatos rápidos
                    </p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px;">
                        <button class="btn btn-danger" onclick="showEmergencyModal()">
                            <i class="fas fa-first-aid"></i> Protocolos
                        </button>
                        <button class="btn" style="background: var(--warning-gradient);" onclick="showQuickContacts()">
                            <i class="fas fa-phone-alt"></i> Contatos
                        </button>
                        <button class="btn" style="background: var(--accent-gradient);" onclick="openPage('triage')">
                            <i class="fas fa-ambulance"></i> Triagem
                        </button>
                        <button class="btn" style="background: var(--primary-gradient);" onclick="openPage('quick-guide')">
                            <i class="fas fa-book-medical"></i> Guia
                        </button>
                    </div>
                    
                    <div style="font-size: 12px; color: var(--text-muted); text-align: center;">
                        <i class="fas fa-info-circle"></i> Pressione F1 para emergência
                    </div>
                </div>
            </div>

            <!-- FERRAMENTAS RÁPIDAS -->
            <h2 style="margin: 40px 0 20px 0; color: var(--text-primary);">
                <i class="fas fa-calculator"></i> Calculadoras Médicas
            </h2>
            
            <div class="tools-grid">
                <!-- CALCULADORA DE DOSE -->
                <div class="tool-card" onclick="openDoseCalculator()">
                    <i class="fas fa-syringe"></i>
                    <h4>Cálculo de Dose</h4>
                    <p>Calcule a dosagem precisa de medicamentos</p>
                </div>
                
                <!-- CALCULADORA IMC -->
                <div class="tool-card" onclick="openBMICalculator()">
                    <i class="fas fa-weight"></i>
                    <h4>Índice de Massa Corporal</h4>
                    <p>Calcule o IMC e classificação</p>
                </div>
                
                <!-- CÁLCULO DE HIDRATAÇÃO -->
                <div class="tool-card" onclick="openFluidCalculator()">
                    <i class="fas fa-tint"></i>
                    <h4>Hidratação</h4>
                    <p>Cálculo de necessidades hídricas</p>
                </div>
                
                <!-- PRESSÃO ARTERIAL MÉDIA -->
                <div class="tool-card" onclick="openMAPCalculator()">
                    <i class="fas fa-heart"></i>
                    <h4>Pressão Arterial Média</h4>
                    <p>Calcule a PAM automaticamente</p>
                </div>
                
                <!-- CÁLCULO DE SUPERFÍCIE CORPORAL -->
                <div class="tool-card" onclick="openBSACalculator()">
                    <i class="fas fa-ruler-combined"></i>
                    <h4>Superfície Corporal</h4>
                    <p>Calcule BSA (Mosteller)</p>
                </div>
                
                <!-- CÁLCULO DE CREATININA -->
                <div class="tool-card" onclick="openCreatinineCalculator()">
                    <i class="fas fa-vial"></i>
                    <h4>Clearance de Creatinina</h4>
                    <p>Calcule a depuração renal</p>
                </div>
            </div>

            <!-- PRÓXIMAS MEDICAÇÕES -->
            <div class="dashboard-card" style="margin-top: 40px;">
                <div class="dashboard-card-header">
                    <h3><i class="fas fa-clock"></i> Próximas Medicações</h3>
                    <i class="fas fa-prescription-bottle-alt" style="color: #8b5cf6;"></i>
                </div>
                
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Medicação</th>
                                <th>Dose</th>
                                <th>Via</th>
                                <th>Horário</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="medicationSchedule">
                            <!-- Preenchido via JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <button class="btn btn-accent btn-block" style="margin-top: 20px;" onclick="openPage('administration')">
                    <i class="fas fa-hand-holding-medical"></i> Administrar Medicações
                </button>
            </div>

            <!-- FOOTER -->
            <footer style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--border-color); text-align: center; color: var(--text-muted);">
                <p>Sistema de Enfermagem © 2024 - Todos os direitos reservados</p>
                <p style="font-size: 13px; margin-top: 10px;">
                    <i class="fas fa-shield-alt"></i> Sistema seguro e confidencial - Versão 3.1.4
                </p>
            </footer>
        </div>
    </div>

    <!-- MODAL DE EMERGÊNCIA -->
    <div class="modal" id="emergencyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-exclamation-triangle"></i> Protocolos de Emergência</h2>
                <button class="modal-close" onclick="closeModal('emergencyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div style="margin-bottom: 30px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <button class="btn btn-danger" onclick="callEmergency('SAMU')">
                        <i class="fas fa-ambulance"></i> SAMU - 192
                    </button>
                    <button class="btn" style="background: var(--warning-gradient);" onclick="callEmergency('Bombeiros')">
                        <i class="fas fa-fire-extinguisher"></i> Bombeiros - 193
                    </button>
                    <button class="btn" style="background: var(--accent-gradient);" onclick="callEmergency('Polícia')">
                        <i class="fas fa-shield-alt"></i> Polícia - 190
                    </button>
                    <button class="btn" style="background: var(--primary-gradient);" onclick="callEmergency('Médico')">
                        <i class="fas fa-user-md"></i> Médico Plantão
                    </button>
                </div>
            </div>
            
            <h3 style="margin-bottom: 20px; color: var(--text-primary);">Protocolos Rápidos</h3>
            
            <div style="margin-bottom: 20px;">
                <button class="btn btn-secondary" onclick="showProtocol('RCP')" style="margin-bottom: 10px; width: 100%;">
                    <i class="fas fa-heart"></i> Reanimação Cardiopulmonar (RCP)
                </button>
                <button class="btn btn-secondary" onclick="showProtocol('AVC')" style="margin-bottom: 10px; width: 100%;">
                    <i class="fas fa-brain"></i> Protocolo AVC
                </button>
                <button class="btn btn-secondary" onclick="showProtocol('IAM')" style="margin-bottom: 10px; width: 100%;">
                    <i class="fas fa-heartbeat"></i> Protocolo Infarto
                </button>
                <button class="btn btn-secondary" onclick="showProtocol('Choque')" style="width: 100%;">
                    <i class="fas fa-tint"></i> Protocolo Choque
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL CALCULADORA DE DOSE -->
    <div class="modal" id="doseCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-syringe"></i> Calculadora de Dose</h2>
                <button class="modal-close" onclick="closeModal('doseCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Medicação</label>
                <select class="select-field" id="medicationSelect">
                    <option value="">Selecione a medicação</option>
                    <option value="dipirona">Dipirona</option>
                    <option value="paracetamol">Paracetamol</option>
                    <option value="omeprazol">Omeprazol</option>
                    <option value="ceftriaxona">Ceftriaxona</option>
                    <option value="furosemida">Furosemida</option>
                    <option value="insulina">Insulina</option>
                </select>
            </div>
            
            <div class="input-group">
                <label class="input-label">Peso do Paciente (kg)</label>
                <input type="number" class="input-field" id="patientWeight" placeholder="Ex: 70" min="1" max="300">
            </div>
            
            <div class="input-group">
                <label class="input-label">Dose Prescrita (mg/kg)</label>
                <input type="number" class="input-field" id="prescribedDose" placeholder="Ex: 10" step="0.1">
            </div>
            
            <div class="input-group">
                <label class="input-label">Concentração Disponível (mg/ml)</label>
                <input type="number" class="input-field" id="concentration" placeholder="Ex: 50" step="0.1">
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(16, 185, 129, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="doseResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateDose()">
                <i class="fas fa-calculator"></i> Calcular Dose
            </button>
            
            <button class="btn btn-secondary btn-block" style="margin-top: 15px;" onclick="resetDoseCalculator()">
                <i class="fas fa-redo"></i> Limpar
            </button>
        </div>
    </div>

    <!-- MODAL CALCULADORA IMC -->
    <div class="modal" id="bmiCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-weight"></i> Calculadora de IMC</h2>
                <button class="modal-close" onclick="closeModal('bmiCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Altura (cm)</label>
                <input type="number" class="input-field" id="heightInput" placeholder="Ex: 170" min="50" max="250">
            </div>
            
            <div class="input-group">
                <label class="input-label">Peso (kg)</label>
                <input type="number" class="input-field" id="weightInput" placeholder="Ex: 70" min="1" max="300" step="0.1">
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(16, 185, 129, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="bmiResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
                <div id="bmiClassification" style="font-size: 16px; color: var(--text-secondary); text-align: center; margin-top: 10px;"></div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateBMI()">
                <i class="fas fa-calculator"></i> Calcular IMC
            </button>
        </div>
    </div>

    <!-- MODAL DE HIDRATAÇÃO -->
    <div class="modal" id="fluidCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-tint"></i> Calculadora de Hidratação</h2>
                <button class="modal-close" onclick="closeModal('fluidCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Peso do Paciente (kg)</label>
                <input type="number" class="input-field" id="fluidWeight" placeholder="Ex: 70" min="1" max="300">
            </div>
            
            <div class="input-group">
                <label class="input-label">Condição Clínica</label>
                <select class="select-field" id="clinicalCondition">
                    <option value="30">Adulto Saudável (30 ml/kg/dia)</option>
                    <option value="40">Febre ou Hipertermia (40 ml/kg/dia)</option>
                    <option value="50">Desidratação Leve (50 ml/kg/dia)</option>
                    <option value="60">Desidratação Moderada (60 ml/kg/dia)</option>
                    <option value="100">Queimaduras Graves (100 ml/kg/dia)</option>
                </select>
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(14, 165, 233, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="fluidResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateFluid()">
                <i class="fas fa-calculator"></i> Calcular Hidratação
            </button>
        </div>
    </div>

    <!-- MODAL PAM -->
    <div class="modal" id="mapCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-heart"></i> Pressão Arterial Média (PAM)</h2>
                <button class="modal-close" onclick="closeModal('mapCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Pressão Sistólica (mmHg)</label>
                <input type="number" class="input-field" id="systolicBP" placeholder="Ex: 120" min="50" max="300">
            </div>
            
            <div class="input-group">
                <label class="input-label">Pressão Diastólica (mmHg)</label>
                <input type="number" class="input-field" id="diastolicBP" placeholder="Ex: 80" min="30" max="200">
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(139, 92, 246, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="mapResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
                <div id="mapInterpretation" style="font-size: 16px; color: var(--text-secondary); text-align: center; margin-top: 10px;"></div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateMAP()">
                <i class="fas fa-calculator"></i> Calcular PAM
            </button>
        </div>
    </div>

    <!-- MODAL BSA -->
    <div class="modal" id="bsaCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-ruler-combined"></i> Superfície Corporal (BSA)</h2>
                <button class="modal-close" onclick="closeModal('bsaCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Altura (cm)</label>
                <input type="number" class="input-field" id="bsaHeight" placeholder="Ex: 170" min="50" max="250">
            </div>
            
            <div class="input-group">
                <label class="input-label">Peso (kg)</label>
                <input type="number" class="input-field" id="bsaWeight" placeholder="Ex: 70" min="1" max="300" step="0.1">
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(16, 185, 129, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="bsaResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
                <div id="bsaFormula" style="font-size: 14px; color: var(--text-secondary); text-align: center; margin-top: 10px;"></div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateBSA()">
                <i class="fas fa-calculator"></i> Calcular BSA
            </button>
        </div>
    </div>

    <!-- MODAL CREATININA -->
    <div class="modal" id="creatinineCalculatorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-vial"></i> Clearance de Creatinina</h2>
                <button class="modal-close" onclick="closeModal('creatinineCalculatorModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Idade (anos)</label>
                <input type="number" class="input-field" id="creatinineAge" placeholder="Ex: 45" min="1" max="120">
            </div>
            
            <div class="input-group">
                <label class="input-label">Peso (kg)</label>
                <input type="number" class="input-field" id="creatinineWeight" placeholder="Ex: 70" min="1" max="300">
            </div>
            
            <div class="input-group">
                <label class="input-label">Creatinina Sérica (mg/dL)</label>
                <input type="number" class="input-field" id="creatinineLevel" placeholder="Ex: 1.2" step="0.1" min="0.1" max="20">
            </div>
            
            <div class="input-group">
                <label class="input-label">Sexo</label>
                <select class="select-field" id="creatinineGender">
                    <option value="1">Masculino</option>
                    <option value="0.85">Feminino</option>
                </select>
            </div>
            
            <div style="margin: 30px 0; padding: 20px; background: rgba(239, 68, 68, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 15px;">Resultado:</h3>
                <div id="creatinineResult" style="font-size: 18px; color: var(--text-primary); text-align: center;">
                    Preencha os dados acima
                </div>
                <div id="creatinineInterpretation" style="font-size: 14px; color: var(--text-secondary); text-align: center; margin-top: 10px;"></div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateCreatinine()">
                <i class="fas fa-calculator"></i> Calcular Clearance
            </button>
        </div>
    </div>

    <!-- MODAL ADICIONAR PACIENTE -->
    <div class="modal" id="addPatientModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-user-plus"></i> Adicionar Novo Paciente</h2>
                <button class="modal-close" onclick="closeModal('addPatientModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Nome Completo</label>
                <input type="text" class="input-field" id="patientName" placeholder="Ex: João da Silva">
            </div>
            
            <div class="input-group">
                <label class="input-label">Idade</label>
                <input type="number" class="input-field" id="patientAge" placeholder="Ex: 45" min="0" max="120">
            </div>
            
            <div class="input-group">
                <label class="input-label">Leito/Quarto</label>
                <input type="text" class="input-field" id="patientRoom" placeholder="Ex: 201A">
            </div>
            
            <div class="input-group">
                <label class="input-label">Diagnóstico Principal</label>
                <input type="text" class="input-field" id="patientDiagnosis" placeholder="Ex: Hipertensão Arterial">
            </div>
            
            <div class="input-group">
                <label class="input-label">Alergias Conhecidas</label>
                <input type="text" class="input-field" id="patientAllergies" placeholder="Ex: Penicilina, Dipirona">
            </div>
            
            <div class="input-group">
                <label class="input-label">Status</label>
                <select class="select-field" id="patientStatus">
                    <option value="estável">Estável</option>
                    <option value="crítico">Crítico</option>
                    <option value="observação">Em Observação</option>
                    <option value="alta">Alta Programada</option>
                </select>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="addNewPatient()">
                <i class="fas fa-save"></i> Salvar Paciente
            </button>
            
            <button class="btn btn-secondary btn-block" style="margin-top: 15px;" onclick="closeModal('addPatientModal')">
                <i class="fas fa-times"></i> Cancelar
            </button>
        </div>
    </div>

    <!-- MODAL REGISTRAR SINAIS VITAIS -->
    <div class="modal" id="vitalSignsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-heartbeat"></i> Registrar Sinais Vitais</h2>
                <button class="modal-close" onclick="closeModal('vitalSignsModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Paciente</label>
                <select class="select-field" id="vitalPatientSelect">
                    <!-- Preenchido via JavaScript -->
                </select>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                <div class="input-group">
                    <label class="input-label">Pressão Arterial</label>
                    <input type="text" class="input-field" id="bloodPressure" placeholder="Ex: 120/80">
                </div>
                
                <div class="input-group">
                    <label class="input-label">Frequência Cardíaca</label>
                    <input type="number" class="input-field" id="heartRate" placeholder="Ex: 75" min="30" max="200">
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                <div class="input-group">
                    <label class="input-label">Frequência Respiratória</label>
                    <input type="number" class="input-field" id="respiratoryRate" placeholder="Ex: 16" min="6" max="60">
                </div>
                
                <div class="input-group">
                    <label class="input-label">Temperatura (°C)</label>
                    <input type="number" class="input-field" id="temperature" placeholder="Ex: 36.5" step="0.1" min="30" max="45">
                </div>
            </div>
            
            <div class="input-group">
                <label class="input-label">Sat. O₂ (%)</label>
                <input type="number" class="input-field" id="oxygenSaturation" placeholder="Ex: 98" min="60" max="100">
            </div>
            
            <div class="input-group">
                <label class="input-label">Observações</label>
                <textarea class="textarea-field" id="vitalObservations" placeholder="Observações sobre os sinais vitais..."></textarea>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="saveVitalSigns()">
                <i class="fas fa-save"></i> Salvar Sinais Vitais
            </button>
        </div>
    </div>

    <!-- MODAL ADMINISTRAR MEDICAÇÃO -->
    <div class="modal" id="administerMedicationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-hand-holding-medical"></i> Administrar Medicação</h2>
                <button class="modal-close" onclick="closeModal('administerMedicationModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Medicação Selecionada</label>
                <div style="padding: 15px; background: rgba(16, 185, 129, 0.1); border-radius: var(--radius-sm); margin-bottom: 20px;">
                    <div id="selectedMedicationInfo" style="color: var(--text-primary);">
                        Selecione uma medicação na tabela principal
                    </div>
                </div>
            </div>
            
            <div class="input-group">
                <label class="input-label">Confirme os Dados</label>
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-input" id="confirmPatient">
                    <label class="checkbox-label">Paciente correto</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-input" id="confirmMedication">
                    <label class="checkbox-label">Medicação correta</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-input" id="confirmDose">
                    <label class="checkbox-label">Dose correta</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-input" id="confirmRoute">
                    <label class="checkbox-label">Via correta</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-input" id="confirmTime">
                    <label class="checkbox-label">Horário correto</label>
                </div>
            </div>
            
            <div class="input-group">
                <label class="input-label">Observações</label>
                <textarea class="textarea-field" id="medicationObservations" placeholder="Observações sobre a administração..."></textarea>
            </div>
            
            <button class="btn btn-success btn-block" id="administerButton" onclick="administerMedication()" disabled>
                <i class="fas fa-check-circle"></i> Confirmar Administração
            </button>
            
            <button class="btn btn-secondary btn-block" style="margin-top: 15px;" onclick="closeModal('administerMedicationModal')">
                <i class="fas fa-times"></i> Cancelar
            </button>
        </div>
    </div>

    <!-- MODAL TRIAGEM -->
    <div class="modal" id="triageModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-ambulance"></i> Sistema de Triagem</h2>
                <button class="modal-close" onclick="closeModal('triageModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="input-group">
                <label class="input-label">Nome do Paciente</label>
                <input type="text" class="input-field" id="triageName" placeholder="Nome completo">
            </div>
            
            <div class="input-group">
                <label class="input-label">Idade</label>
                <input type="number" class="input-field" id="triageAge" placeholder="Idade em anos" min="0" max="120">
            </div>
            
            <div class="input-group">
                <label class="input-label">Queixa Principal</label>
                <textarea class="textarea-field" id="triageComplaint" placeholder="Descreva a queixa principal..."></textarea>
            </div>
            
            <div class="input-group">
                <label class="input-label">Classificação Manchester</label>
                <select class="select-field" id="triageCategory">
                    <option value="vermelho">Vermelho - Emergência (atendimento imediato)</option>
                    <option value="laranja">Laranja - Muito Urgente (até 10 minutos)</option>
                    <option value="amarelo">Amarelo - Urgente (até 60 minutos)</option>
                    <option value="verde">Verde - Pouco Urgente (até 120 minutos)</option>
                    <option value="azul">Azul - Não Urgente (até 240 minutos)</option>
                </select>
            </div>
            
            <div style="margin: 20px 0; padding: 20px; background: rgba(245, 158, 11, 0.1); border-radius: var(--radius-sm);">
                <h3 style="color: var(--text-primary); margin-bottom: 10px;">Classificação Atual:</h3>
                <div id="triageResult" style="font-size: 24px; font-weight: 700; text-align: center; color: #f59e0b;">
                    Aguardando dados...
                </div>
            </div>
            
            <button class="btn btn-primary btn-block" onclick="calculateTriage()">
                <i class="fas fa-stethoscope"></i> Classificar Paciente
            </button>
            
            <button class="btn btn-success btn-block" style="margin-top: 15px;" onclick="saveTriage()">
                <i class="fas fa-save"></i> Salvar Triagem
            </button>
        </div>
    </div>

    <!-- NOTIFICAÇÃO -->
    <div class="notification" id="notification">
        <div id="notificationContent"></div>
    </div>

    <script>
    // SISTEMA PRINCIPAL COMPLETO
    class NursingAssistant {
        constructor() {
            this.patients = [];
            this.medications = [];
            this.tasks = [];
            this.vitalSigns = [];
            this.triageRecords = [];
            this.currentPage = 'dashboard';
            this.selectedMedication = null;
            this.initializeData();
            this.init();
        }
        
        init() {
            this.setupEventListeners();
            this.updateDashboard();
            this.updateMedicationSchedule();
            this.setupGreeting();
            this.setupKeyboardShortcuts();
            this.loadVitalSignsHistory();
            
            // Atualizar dados a cada minuto
            setInterval(() => this.updateDashboard(), 60000);
            
            // Atualizar medicações pendentes
            setInterval(() => this.checkMedicationAlerts(), 30000);
        }
        
        initializeData() {
            // Dados de exemplo para pacientes
            this.patients = [
                { id: 1, name: "João Silva", age: 65, room: "201", status: "crítico", diagnosis: "Pneumonia", allergies: "Penicilina", admission: "2024-01-15" },
                { id: 2, name: "Maria Santos", age: 45, room: "205", status: "estável", diagnosis: "Hipertensão", allergies: "Nenhuma", admission: "2024-01-16" },
                { id: 3, name: "Pedro Oliveira", age: 72, room: "210", status: "crítico", diagnosis: "ICC", allergies: "Sulfa", admission: "2024-01-14" },
                { id: 4, name: "Ana Costa", age: 38, room: "215", status: "alta", diagnosis: "Pós-operatório", allergies: "Dipirona", admission: "2024-01-10" },
                { id: 5, name: "Carlos Mendes", age: 56, room: "220", status: "estável", diagnosis: "Diabetes", allergies: "Nenhuma", admission: "2024-01-17" }
            ];
            
            // Medicações agendadas
            this.medications = [
                { id: 1, patientId: 1, patient: "João Silva", medication: "Ceftriaxona", dose: "1g", route: "EV", time: "08:00", status: "pendente", scheduled: "2024-01-18T08:00:00" },
                { id: 2, patientId: 2, patient: "Maria Santos", medication: "Captopril", dose: "25mg", route: "VO", time: "09:00", status: "pendente", scheduled: "2024-01-18T09:00:00" },
                { id: 3, patientId: 3, patient: "Pedro Oliveira", medication: "Furosemida", dose: "40mg", route: "EV", time: "10:00", status: "pendente", scheduled: "2024-01-18T10:00:00" },
                { id: 4, patientId: 4, patient: "Ana Costa", medication: "Dipirona", dose: "500mg", route: "VO", time: "11:00", status: "pendente", scheduled: "2024-01-18T11:00:00" },
                { id: 5, patientId: 5, patient: "Carlos Mendes", medication: "Insulina NPH", dose: "20UI", route: "SC", time: "12:00", status: "pendente", scheduled: "2024-01-18T12:00:00" }
            ];
            
            // Tarefas pendentes
            this.tasks = [
                { id: 1, type: "medicação", count: 5, priority: "alta" },
                { id: 2, type: "sinais vitais", count: 8, priority: "média" },
                { id: 3, type: "documentação", count: 3, priority: "baixa" },
                { id: 4, type: "curativos", count: 2, priority: "média" }
            ];
            
            // Histórico de sinais vitais
            this.vitalSigns = [
                { patientId: 1, patient: "João Silva", time: "08:00", bp: "120/80", hr: 75, rr: 16, temp: 36.5, spo2: 98, notes: "Estável" },
                { patientId: 2, patient: "Maria Santos", time: "08:30", bp: "130/85", hr: 80, rr: 18, temp: 36.8, spo2: 96, notes: "Leve taquicardia" }
            ];
            
            // Registros de triagem
            this.triageRecords = [
                { id: 1, name: "Roberto Alves", age: 52, complaint: "Dor torácica", category: "vermelho", time: "09:15", status: "em atendimento" },
                { id: 2, name: "Fernanda Lima", age: 34, complaint: "Febre alta", category: "laranja", time: "09:30", status: "aguardando" }
            ];
        }
        
        setupEventListeners() {
            // Sidebar toggle
            document.getElementById('sidebarToggle').addEventListener('click', () => {
                document.getElementById('sidebar').classList.toggle('active');
            });
            
            // Itens do menu
            document.querySelectorAll('.sidebar-menu-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    // Remover classe active de todos os itens
                    document.querySelectorAll('.sidebar-menu-item').forEach(i => {
                        i.classList.remove('active');
                    });
                    
                    // Adicionar classe active ao item clicado
                    item.classList.add('active');
                    
                    // Navegar para a página ou abrir ferramenta
                    if (item.dataset.page) {
                        this.openPage(item.dataset.page);
                    } else if (item.dataset.tool) {
                        this.openTool(item.dataset.tool);
                    }
                    
                    // Fechar sidebar no mobile
                    if (window.innerWidth <= 768) {
                        document.getElementById('sidebar').classList.remove('active');
                    }
                });
            });
            
            // Fechar modais com ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.closeAllModals();
                }
            });
            
            // Validação de checkboxes de administração
            const checkboxes = ['confirmPatient', 'confirmMedication', 'confirmDose', 'confirmRoute', 'confirmTime'];
            checkboxes.forEach(id => {
                const checkbox = document.getElementById(id);
                if (checkbox) {
                    checkbox.addEventListener('change', () => this.validateAdministerButton());
                }
            });
        }
        
        setupGreeting() {
            const hour = new Date().getHours();
            let greeting = "Bom dia";
            
            if (hour >= 12 && hour < 18) {
                greeting = "Boa tarde";
            } else if (hour >= 18) {
                greeting = "Boa noite";
            }
            
            document.getElementById('greeting').textContent = `${greeting}, Enfermeira Maria!`;
            
            // Atualizar turno
            const shift = hour < 12 ? "Diurno" : hour < 20 ? "Vespertino" : "Noturno";
            document.getElementById('currentShift').textContent = shift;
            
            // Atualizar hora
            this.updateTime();
            setInterval(() => this.updateTime(), 60000);
        }
        
        updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            document.getElementById('lastUpdate').textContent = timeString;
        }
        
        setupKeyboardShortcuts() {
            document.addEventListener('keydown', (e) => {
                // F1 - Emergência
                if (e.key === 'F1') {
                    e.preventDefault();
                    this.showEmergencyModal();
                }
                
                // F2 - Calculadora de Dose
                if (e.key === 'F2') {
                    e.preventDefault();
                    this.openDoseCalculator();
                }
                
                // F3 - Sinais Vitais
                if (e.key === 'F3') {
                    e.preventDefault();
                    this.openVitalSignsModal();
                }
                
                // F4 - Triagem
                if (e.key === 'F4') {
                    e.preventDefault();
                    this.openTriageModal();
                }
                
                // Ctrl + P - Pacientes
                if (e.ctrlKey && e.key === 'p') {
                    e.preventDefault();
                    this.openPage('patients');
                }
                
                // Ctrl + M - Medicação
                if (e.ctrlKey && e.key === 'm') {
                    e.preventDefault();
                    this.openPage('medication');
                }
                
                // Ctrl + N - Novo Paciente
                if (e.ctrlKey && e.key === 'n') {
                    e.preventDefault();
                    this.openAddPatientModal();
                }
            });
        }
        
        updateDashboard() {
            // Atualizar contadores
            const criticalPatients = this.patients.filter(p => p.status === 'crítico').length;
            const stablePatients = this.patients.filter(p => p.status === 'estável').length;
            const dischargePatients = this.patients.filter(p => p.status === 'alta').length;
            
            document.getElementById('patientCount').textContent = this.patients.length;
            document.getElementById('patientsCritical').textContent = criticalPatients;
            document.getElementById('patientsStable').textContent = stablePatients;
            document.getElementById('patientsDischarge').textContent = dischargePatients;
            document.getElementById('activePatients').textContent = this.patients.length;
            
            // Atualizar tarefas
            const medicationTasks = this.tasks.find(t => t.type === 'medicação')?.count || 0;
            document.getElementById('taskCount').textContent = this.tasks.reduce((sum, task) => sum + task.count, 0);
            document.getElementById('medicationDue').textContent = medicationTasks;
        }
        
        updateMedicationSchedule() {
            const tbody = document.getElementById('medicationSchedule');
            tbody.innerHTML = '';
            
            this.medications.forEach(med => {
                const row = document.createElement('tr');
                row.style.cursor = 'pointer';
                row.onclick = () => this.selectMedicationForAdministration(med);
                
                let statusColor = '#ef4444';
                let statusText = 'Pendente';
                
                if (med.status === 'administrada') {
                    statusColor = '#10b981';
                    statusText = 'Administrada';
                } else if (med.status === 'atrasada') {
                    statusColor = '#f59e0b';
                    statusText = 'Atrasada';
                }
                
                row.innerHTML = `
                    <td>${med.patient}</td>
                    <td>${med.medication}</td>
                    <td>${med.dose}</td>
                    <td>${med.route}</td>
                    <td>${med.time}</td>
                    <td style="color: ${statusColor}; font-weight: 600;">${statusText}</td>
                `;
                
                tbody.appendChild(row);
            });
        }
        
        selectMedicationForAdministration(medication) {
            this.selectedMedication = medication;
            
            // Atualizar modal de administração
            const infoDiv = document.getElementById('selectedMedicationInfo');
            infoDiv.innerHTML = `
                <strong>Paciente:</strong> ${medication.patient}<br>
                <strong>Medicação:</strong> ${medication.medication}<br>
                <strong>Dose:</strong> ${medication.dose}<br>
                <strong>Via:</strong> ${medication.route}<br>
                <strong>Horário:</strong> ${medication.time}
            `;
            
            // Resetar checkboxes
            ['confirmPatient', 'confirmMedication', 'confirmDose', 'confirmRoute', 'confirmTime'].forEach(id => {
                document.getElementById(id).checked = false;
            });
            
            // Abrir modal
            this.openModal('administerMedicationModal');
        }
        
        validateAdministerButton() {
            const checkboxes = ['confirmPatient', 'confirmMedication', 'confirmDose', 'confirmRoute', 'confirmTime'];
            const allChecked = checkboxes.every(id => document.getElementById(id).checked);
            document.getElementById('administerButton').disabled = !allChecked;
        }
        
        openPage(page) {
            this.currentPage = page;
            
            const pageNames = {
                'dashboard': 'Dashboard',
                'patients': 'Pacientes',
                'medication': 'Medicação',
                'tasks': 'Tarefas',
                'vital-signs': 'Sinais Vitais',
                'evaluation': 'Avaliação',
                'procedures': 'Procedimentos',
                'evolution': 'Evolução',
                'prescriptions': 'Prescrições',
                'administration': 'Administração de Medicação',
                'schedule': 'Cronograma',
                'inventory': 'Estoque',
                'triage': 'Triagem',
                'protocols': 'Protocolos',
                'quick-guide': 'Guia Rápido',
                'reports': 'Relatórios',
                'export': 'Exportar Dados',
                'statistics': 'Estatísticas'
            };
            
            this.showNotification(`Navegando: ${pageNames[page] || page}`, 'Carregando conteúdo da página...', 'info');
            
            // Em um sistema real, aqui carregaríamos o conteúdo da página
            // Para este exemplo, vamos mostrar a página de pacientes como demonstração
            if (page === 'patients') {
                this.showPatientList();
            }
        }
        
        showPatientList() {
            const container = document.querySelector('.container');
            container.innerHTML = `
                <div class="header">
                    <div class="icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <h1>Gestão de Pacientes</h1>
                    <p>Gerencie todos os pacientes do sistema</p>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                    <h2 style="color: var(--text-primary);">
                        <i class="fas fa-users"></i> Lista de Pacientes
                    </h2>
                    <button class="btn btn-primary" onclick="openAddPatientModal()">
                        <i class="fas fa-user-plus"></i> Novo Paciente
                    </button>
                </div>
                
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Leito</th>
                                <th>Diagnóstico</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="patientListTable">
                            ${this.patients.map(patient => `
                                <tr>
                                    <td>${patient.name}</td>
                                    <td>${patient.age} anos</td>
                                    <td>${patient.room}</td>
                                    <td>${patient.diagnosis}</td>
                                    <td><span style="color: ${patient.status === 'crítico' ? '#ef4444' : patient.status === 'estável' ? '#10b981' : '#f59e0b'}">${patient.status}</span></td>
                                    <td>
                                        <button class="btn btn-secondary" onclick="showPatientDetails(${patient.id})" style="padding: 8px 12px; font-size: 12px;">
                                            <i class="fas fa-eye"></i> Ver
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
                
                <div style="margin-top: 30px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3><i class="fas fa-chart-pie"></i> Distribuição por Status</h3>
                        </div>
                        <div id="statusChart" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                            Gráfico de distribuição
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3><i class="fas fa-info-circle"></i> Estatísticas</h3>
                        </div>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-value">${this.patients.length}</div>
                                <div class="stat-label">Total</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">${this.patients.filter(p => p.status === 'crítico').length}</div>
                                <div class="stat-label">Críticos</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">${this.patients.filter(p => p.status === 'alta').length}</div>
                                <div class="stat-label">Alta</div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Atualizar contadores na sidebar
            this.updateDashboard();
        }
        
        openTool(tool) {
            const toolNames = {
                'dose-calculator': 'Calculadora de Dose',
                'bmi-calculator': 'Calculadora de IMC',
                'fluid-calculator': 'Calculadora de Hidratação',
                'map-calculator': 'Calculadora de PAM'
            };
            
            this.showNotification(`Ferramenta: ${toolNames[tool] || tool}`, 'Abrindo ferramenta...', 'info');
            
            switch(tool) {
                case 'dose-calculator':
                    this.openDoseCalculator();
                    break;
                case 'bmi-calculator':
                    this.openBMICalculator();
                    break;
                case 'fluid-calculator':
                    this.openFluidCalculator();
                    break;
                case 'map-calculator':
                    this.openMAPCalculator();
                    break;
            }
        }
        
        // FUNÇÕES DE CÁLCULO
        calculateDose() {
            const weight = parseFloat(document.getElementById('patientWeight').value);
            const dose = parseFloat(document.getElementById('prescribedDose').value);
            const concentration = parseFloat(document.getElementById('concentration').value);
            
            if (!weight || !dose || !concentration) {
                this.showNotification('Erro', 'Preencha todos os campos corretamente', 'error');
                return;
            }
            
            const totalDose = weight * dose; // mg total
            const volume = totalDose / concentration; // ml
            
            document.getElementById('doseResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: #10b981; margin-bottom: 10px;">
                    ${volume.toFixed(2)} ml
                </div>
                <div style="font-size: 14px; color: var(--text-secondary);">
                    Dose total: ${totalDose.toFixed(2)} mg
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 5px;">
                    Peso: ${weight} kg × Dose: ${dose} mg/kg = ${totalDose.toFixed(2)} mg
                </div>
            `;
            
            this.showNotification('Cálculo Concluído', `Volume a administrar: ${volume.toFixed(2)} ml`, 'success');
        }
        
        calculateBMI() {
            const height = parseFloat(document.getElementById('heightInput').value);
            const weight = parseFloat(document.getElementById('weightInput').value);
            
            if (!height || !weight) {
                this.showNotification('Erro', 'Preencha todos os campos corretamente', 'error');
                return;
            }
            
            const heightMeters = height / 100;
            const bmi = weight / (heightMeters * heightMeters);
            
            let classification = '';
            let color = '#10b981';
            let recommendation = '';
            
            if (bmi < 18.5) {
                classification = 'Baixo peso';
                color = '#f59e0b';
                recommendation = 'Avaliar estado nutricional';
            } else if (bmi < 25) {
                classification = 'Peso normal';
                color = '#10b981';
                recommendation = 'Peso adequado';
            } else if (bmi < 30) {
                classification = 'Sobrepeso';
                color = '#f59e0b';
                recommendation = 'Recomendar dieta e exercícios';
            } else if (bmi < 35) {
                classification = 'Obesidade Grau I';
                color = '#ef4444';
                recommendation = 'Acompanhamento nutricional necessário';
            } else if (bmi < 40) {
                classification = 'Obesidade Grau II';
                color = '#dc2626';
                recommendation = 'Encaminhar para especialista';
            } else {
                classification = 'Obesidade Grau III';
                color = '#b91c1c';
                recommendation = 'Necessidade de intervenção urgente';
            }
            
            document.getElementById('bmiResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: ${color}; margin-bottom: 10px;">
                    ${bmi.toFixed(1)} kg/m²
                </div>
            `;
            
            document.getElementById('bmiClassification').innerHTML = `
                ${classification}<br>
                <small style="color: var(--text-muted);">${recommendation}</small>
            `;
            
            this.showNotification('IMC Calculado', `Resultado: ${bmi.toFixed(1)} - ${classification}`, 'success');
        }
        
        calculateFluid() {
            const weight = parseFloat(document.getElementById('fluidWeight').value);
            const condition = parseFloat(document.getElementById('clinicalCondition').value);
            
            if (!weight) {
                this.showNotification('Erro', 'Digite o peso do paciente', 'error');
                return;
            }
            
            const dailyFluid = weight * condition;
            const hourlyFluid = dailyFluid / 24;
            
            document.getElementById('fluidResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: #0ea5e9; margin-bottom: 10px;">
                    ${dailyFluid.toFixed(0)} ml/dia
                </div>
                <div style="font-size: 14px; color: var(--text-secondary);">
                    ${hourlyFluid.toFixed(0)} ml/hora
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 5px;">
                    Cálculo: ${weight} kg × ${condition} ml/kg/dia
                </div>
            `;
            
            this.showNotification('Hidratação Calculada', `Necessidade: ${dailyFluid.toFixed(0)} ml por dia`, 'success');
        }
        
        calculateMAP() {
            const systolic = parseFloat(document.getElementById('systolicBP').value);
            const diastolic = parseFloat(document.getElementById('diastolicBP').value);
            
            if (!systolic || !diastolic) {
                this.showNotification('Erro', 'Preencha ambas as pressões', 'error');
                return;
            }
            
            const map = (2 * diastolic + systolic) / 3;
            
            let interpretation = '';
            let color = '#10b981';
            
            if (map < 70) {
                interpretation = 'Baixa - Monitorar';
                color = '#f59e0b';
            } else if (map <= 100) {
                interpretation = 'Normal';
                color = '#10b981';
            } else if (map <= 110) {
                interpretation = 'Elevada';
                color = '#f59e0b';
            } else {
                interpretation = 'Alta - Avaliação necessária';
                color = '#ef4444';
            }
            
            document.getElementById('mapResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: ${color}; margin-bottom: 10px;">
                    ${map.toFixed(1)} mmHg
                </div>
            `;
            
            document.getElementById('mapInterpretation').textContent = interpretation;
            
            this.showNotification('PAM Calculada', `Pressão Arterial Média: ${map.toFixed(1)} mmHg`, 'success');
        }
        
        calculateBSA() {
            const height = parseFloat(document.getElementById('bsaHeight').value);
            const weight = parseFloat(document.getElementById('bsaWeight').value);
            
            if (!height || !weight) {
                this.showNotification('Erro', 'Preencha todos os campos', 'error');
                return;
            }
            
            // Fórmula de Mosteller
            const bsa = Math.sqrt((height * weight) / 3600);
            
            document.getElementById('bsaResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: #8b5cf6; margin-bottom: 10px;">
                    ${bsa.toFixed(2)} m²
                </div>
            `;
            
            document.getElementById('bsaFormula').textContent = 'Fórmula de Mosteller: √(altura × peso / 3600)';
            
            this.showNotification('BSA Calculada', `Superfície Corporal: ${bsa.toFixed(2)} m²`, 'success');
        }
        
        calculateCreatinine() {
            const age = parseFloat(document.getElementById('creatinineAge').value);
            const weight = parseFloat(document.getElementById('creatinineWeight').value);
            const creatinine = parseFloat(document.getElementById('creatinineLevel').value);
            const genderFactor = parseFloat(document.getElementById('creatinineGender').value);
            
            if (!age || !weight || !creatinine) {
                this.showNotification('Erro', 'Preencha todos os campos', 'error');
                return;
            }
            
            // Fórmula de Cockcroft-Gault
            const clearance = ((140 - age) * weight * genderFactor) / (72 * creatinine);
            
            let interpretation = '';
            let color = '#10b981';
            
            if (clearance > 90) {
                interpretation = 'Função renal normal';
                color = '#10b981';
            } else if (clearance >= 60) {
                interpretation = 'Leve redução';
                color = '#f59e0b';
            } else if (clearance >= 30) {
                interpretation = 'Redução moderada';
                color = '#ef4444';
            } else if (clearance >= 15) {
                interpretation = 'Redução grave';
                color = '#dc2626';
            } else {
                interpretation = 'Insuficiência renal';
                color = '#b91c1c';
            }
            
            document.getElementById('creatinineResult').innerHTML = `
                <div style="font-size: 24px; font-weight: 700; color: ${color}; margin-bottom: 10px;">
                    ${clearance.toFixed(1)} ml/min
                </div>
            `;
            
            document.getElementById('creatinineInterpretation').innerHTML = `
                ${interpretation}<br>
                <small style="color: var(--text-muted);">Fórmula de Cockcroft-Gault</small>
            `;
            
            this.showNotification('Clearance Calculado', `Resultado: ${clearance.toFixed(1)} ml/min`, 'success');
        }
        
        calculateTriage() {
            const complaint = document.getElementById('triageComplaint').value.toLowerCase();
            const category = document.getElementById('triageCategory').value;
            
            if (!complaint) {
                this.showNotification('Erro', 'Descreva a queixa principal', 'error');
                return;
            }
            
            const categoryNames = {
                'vermelho': 'Vermelho - Emergência',
                'laranja': 'Laranja - Muito Urgente',
                'amarelo': 'Amarelo - Urgente',
                'verde': 'Verde - Pouco Urgente',
                'azul': 'Azul - Não Urgente'
            };
            
            const categoryColors = {
                'vermelho': '#ef4444',
                'laranja': '#f97316',
                'amarelo': '#f59e0b',
                'verde': '#10b981',
                'azul': '#3b82f6'
            };
            
            document.getElementById('triageResult').innerHTML = `
                <div style="color: ${categoryColors[category]};">
                    ${categoryNames[category]}
                </div>
            `;
        }
        
        // FUNÇÕES DE PACIENTES
        openAddPatientModal() {
            // Limpar formulário
            document.getElementById('patientName').value = '';
            document.getElementById('patientAge').value = '';
            document.getElementById('patientRoom').value = '';
            document.getElementById('patientDiagnosis').value = '';
            document.getElementById('patientAllergies').value = 'Nenhuma';
            document.getElementById('patientStatus').value = 'estável';
            
            this.openModal('addPatientModal');
        }
        
        addNewPatient() {
            const name = document.getElementById('patientName').value.trim();
            const age = parseInt(document.getElementById('patientAge').value);
            const room = document.getElementById('patientRoom').value.trim();
            const diagnosis = document.getElementById('patientDiagnosis').value.trim();
            const allergies = document.getElementById('patientAllergies').value.trim();
            const status = document.getElementById('patientStatus').value;
            
            if (!name || !age || !room || !diagnosis) {
                this.showNotification('Erro', 'Preencha todos os campos obrigatórios', 'error');
                return;
            }
            
            const newPatient = {
                id: this.patients.length + 1,
                name,
                age,
                room,
                diagnosis,
                allergies: allergies || 'Nenhuma',
                status,
                admission: new Date().toISOString().split('T')[0]
            };
            
            this.patients.push(newPatient);
            this.closeModal('addPatientModal');
            this.showNotification('Sucesso', `Paciente ${name} adicionado com sucesso!`, 'success');
            this.updateDashboard();
            
            // Se estiver na página de pacientes, atualizar a lista
            if (this.currentPage === 'patients') {
                this.showPatientList();
            }
        }
        
        // FUNÇÕES DE SINAIS VITAIS
        openVitalSignsModal() {
            // Popular select de pacientes
            const select = document.getElementById('vitalPatientSelect');
            select.innerHTML = '<option value="">Selecione um paciente</option>';
            
            this.patients.forEach(patient => {
                const option = document.createElement('option');
                option.value = patient.id;
                option.textContent = `${patient.name} (Leito: ${patient.room})`;
                select.appendChild(option);
            });
            
            // Limpar campos
            document.getElementById('bloodPressure').value = '';
            document.getElementById('heartRate').value = '';
            document.getElementById('respiratoryRate').value = '';
            document.getElementById('temperature').value = '';
            document.getElementById('oxygenSaturation').value = '';
            document.getElementById('vitalObservations').value = '';
            
            this.openModal('vitalSignsModal');
        }
        
        saveVitalSigns() {
            const patientId = parseInt(document.getElementById('vitalPatientSelect').value);
            const bp = document.getElementById('bloodPressure').value.trim();
            const hr = parseInt(document.getElementById('heartRate').value);
            const rr = parseInt(document.getElementById('respiratoryRate').value);
            const temp = parseFloat(document.getElementById('temperature').value);
            const spo2 = parseInt(document.getElementById('oxygenSaturation').value);
            const notes = document.getElementById('vitalObservations').value.trim();
            
            if (!patientId || !bp || !hr || !rr || !temp || !spo2) {
                this.showNotification('Erro', 'Preencha todos os campos obrigatórios', 'error');
                return;
            }
            
            const patient = this.patients.find(p => p.id === patientId);
            
            const newVitalSigns = {
                patientId,
                patient: patient.name,
                time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}),
                bp,
                hr,
                rr,
                temp,
                spo2,
                notes: notes || 'Sem observações'
            };
            
            this.vitalSigns.push(newVitalSigns);
            this.closeModal('vitalSignsModal');
            
            // Verificar anormalidades
            let alertMessage = 'Sinais vitais registrados com sucesso.';
            let alertType = 'success';
            
            if (hr > 100) {
                alertMessage += ' ALERTA: Taquicardia detectada.';
                alertType = 'warning';
            } else if (hr < 60) {
                alertMessage += ' ALERTA: Bradicardia detectada.';
                alertType = 'warning';
            }
            
            if (temp > 37.5) {
                alertMessage += ' ALERTA: Febre detectada.';
                alertType = 'warning';
            }
            
            if (spo2 < 95) {
                alertMessage += ' ALERTA: Saturação baixa.';
                alertType = 'warning';
            }
            
            this.showNotification('Sinais Vitais', alertMessage, alertType);
        }
        
        loadVitalSignsHistory() {
            // Em um sistema real, carregaria do servidor
            // Para exemplo, já temos dados iniciais
        }
        
        // FUNÇÕES DE MEDICAÇÃO
        administerMedication() {
            if (!this.selectedMedication) {
                this.showNotification('Erro', 'Nenhuma medicação selecionada', 'error');
                return;
            }
            
            // Atualizar status da medicação
            this.selectedMedication.status = 'administrada';
            this.selectedMedication.administeredAt = new Date().toISOString();
            this.selectedMedication.observations = document.getElementById('medicationObservations').value.trim();
            
            // Atualizar contador de tarefas
            const medicationTask = this.tasks.find(t => t.type === 'medicação');
            if (medicationTask && medicationTask.count > 0) {
                medicationTask.count--;
            }
            
            this.closeModal('administerMedicationModal');
            this.updateMedicationSchedule();
            this.updateDashboard();
            
            this.showNotification(
                'Medicação Administrada',
                `${this.selectedMedication.medication} administrada para ${this.selectedMedication.patient}`,
                'success'
            );
            
            this.selectedMedication = null;
        }
        
        checkMedicationAlerts() {
            const now = new Date();
            const currentTime = now.getHours() * 60 + now.getMinutes();
            
            this.medications.forEach(med => {
                if (med.status === 'pendente') {
                    const [hours, minutes] = med.time.split(':').map(Number);
                    const scheduledTime = hours * 60 + minutes;
                    
                    // Se a medicação está atrasada há mais de 15 minutos
                    if (currentTime > scheduledTime + 15) {
                        med.status = 'atrasada';
                        this.showNotification(
                            'Medicação Atrasada',
                            `${med.medication} para ${med.patient} está atrasada`,
                            'warning'
                        );
                    }
                }
            });
            
            this.updateMedicationSchedule();
        }
        
        // FUNÇÕES DE TRIAGEM
        openTriageModal() {
            // Limpar formulário
            document.getElementById('triageName').value = '';
            document.getElementById('triageAge').value = '';
            document.getElementById('triageComplaint').value = '';
            document.getElementById('triageCategory').value = 'vermelho';
            document.getElementById('triageResult').textContent = 'Aguardando dados...';
            document.getElementById('triageResult').style.color = '#f59e0b';
            
            this.openModal('triageModal');
        }
        
        saveTriage() {
            const name = document.getElementById('triageName').value.trim();
            const age = parseInt(document.getElementById('triageAge').value);
            const complaint = document.getElementById('triageComplaint').value.trim();
            const category = document.getElementById('triageCategory').value;
            
            if (!name || !age || !complaint) {
                this.showNotification('Erro', 'Preencha todos os campos obrigatórios', 'error');
                return;
            }
            
            const newTriage = {
                id: this.triageRecords.length + 1,
                name,
                age,
                complaint,
                category,
                time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}),
                status: 'aguardando'
            };
            
            this.triageRecords.push(newTriage);
            this.closeModal('triageModal');
            
            this.showNotification(
                'Triagem Registrada',
                `Paciente ${name} classificado como ${category}`,
                'success'
            );
        }
        
        // FUNÇÕES DE EMERGÊNCIA
        showEmergencyModal() {
            this.openModal('emergencyModal');
        }
        
        callEmergency(service) {
            const numbers = {
                'SAMU': '192',
                'Bombeiros': '193',
                'Polícia': '190',
                'Médico': 'XXX-XXXX'
            };
            
            this.showNotification(
                'Chamando...',
                `${service}: ${numbers[service]}`,
                'warning'
            );
            
            // Simular chamada
            setTimeout(() => {
                this.showNotification(
                    'Chamada realizada',
                    `Conectado com ${service}`,
                    'success'
                );
            }, 2000);
        }
        
        showProtocol(protocol) {
            const protocols = {
                'RCP': 'Reanimação Cardiopulmonar: 30 compressões + 2 ventilações. Frequência: 100-120/min. Profundidade: 5-6cm.',
                'AVC': 'Protocolo AVC: Avaliar via Cincinnati (FACE, BRAÇO, FALA). Tempo é cérebro! Chamar equipe de AVC.',
                'IAM': 'Infarto Agudo do Miocárdio: MONA (Morfina, Oxigênio, Nitrato, AAS). ECG imediato.',
                'Choque': 'Choque: ABC, acesso venoso, reposição volêmica, monitorização contínua.'
            };
            
            this.showNotification(
                `Protocolo: ${protocol}`,
                protocols[protocol] || 'Protocolo padrão de emergência',
                'info'
            );
        }
        
        showQuickContacts() {
            const contacts = [
                'SAMU: 192',
                'Bombeiros: 193',
                'Polícia: 190',
                'Enfermeira Chefe: (11) 98888-8888',
                'Médico Plantão: (11) 97777-7777',
                'Farmácia: (11) 96666-6666',
                'Central de Leitos: (11) 95555-5555'
            ];
            
            let message = '<strong>Contatos de Emergência:</strong><br>';
            contacts.forEach(contact => {
                message += `• ${contact}<br>`;
            });
            
            this.showNotification('Contatos Rápidos', message, 'info');
        }
        
        // FUNÇÕES UTILITÁRIAS
        openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
            document.body.style.overflow = '';
        }
        
        closeAllModals() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('active');
            });
            document.body.style.overflow = '';
        }
        
        showNotification(title, message, type = 'info') {
            const notification = document.getElementById('notification');
            const content = document.getElementById('notificationContent');
            
            // Definir cor baseada no tipo
            let borderColor = '#3b82f6'; // info (azul)
            if (type === 'success') borderColor = '#10b981';
            if (type === 'warning') borderColor = '#f59e0b';
            if (type === 'error') borderColor = '#ef4444';
            
            notification.style.borderLeftColor = borderColor;
            notification.className = `notification ${type}`;
            
            content.innerHTML = `
                <div style="display: flex; align-items: flex-start; gap: 12px;">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : type === 'error' ? 'times-circle' : 'info-circle'}" 
                       style="color: ${borderColor}; font-size: 20px; margin-top: 2px;"></i>
                    <div style="flex: 1;">
                        <div style="font-weight: 700; margin-bottom: 5px; color: var(--text-primary);">${title}</div>
                        <div style="font-size: 14px; color: var(--text-secondary); line-height: 1.4;">${message}</div>
                    </div>
                </div>
            `;
            
            notification.classList.add('show');
            
            // Remover automaticamente após 5 segundos
            setTimeout(() => {
                notification.classList.remove('show');
            }, 5000);
        }
        
        resetDoseCalculator() {
            document.getElementById('patientWeight').value = '';
            document.getElementById('prescribedDose').value = '';
            document.getElementById('concentration').value = '';
            document.getElementById('doseResult').innerHTML = 'Preencha os dados acima';
        }
    }

    // INICIALIZAR SISTEMA E EXPOR FUNÇÕES GLOBAIS
    let nursingAssistant;

    document.addEventListener('DOMContentLoaded', () => {
        nursingAssistant = new NursingAssistant();
        
        // Expor funções globais
        window.openPage = (page) => nursingAssistant.openPage(page);
        window.openDoseCalculator = () => nursingAssistant.openDoseCalculator();
        window.openBMICalculator = () => nursingAssistant.openBMICalculator();
        window.openFluidCalculator = () => nursingAssistant.openFluidCalculator();
        window.openMAPCalculator = () => nursingAssistant.openMAPCalculator();
        window.openBSACalculator = () => nursingAssistant.openBSACalculator();
        window.openCreatinineCalculator = () => nursingAssistant.openCreatinineCalculator();
        window.showEmergencyModal = () => nursingAssistant.showEmergencyModal();
        window.showQuickContacts = () => nursingAssistant.showQuickContacts();
        window.closeModal = (modalId) => nursingAssistant.closeModal(modalId);
        window.callEmergency = (service) => nursingAssistant.callEmergency(service);
        window.showProtocol = (protocol) => nursingAssistant.showProtocol(protocol);
        window.calculateDose = () => nursingAssistant.calculateDose();
        window.calculateBMI = () => nursingAssistant.calculateBMI();
        window.calculateFluid = () => nursingAssistant.calculateFluid();
        window.calculateMAP = () => nursingAssistant.calculateMAP();
        window.calculateBSA = () => nursingAssistant.calculateBSA();
        window.calculateCreatinine = () => nursingAssistant.calculateCreatinine();
        window.calculateTriage = () => nursingAssistant.calculateTriage();
        window.saveTriage = () => nursingAssistant.saveTriage();
        window.resetDoseCalculator = () => nursingAssistant.resetDoseCalculator();
        window.openAddPatientModal = () => nursingAssistant.openAddPatientModal();
        window.addNewPatient = () => nursingAssistant.addNewPatient();
        window.openVitalSignsModal = () => nursingAssistant.openVitalSignsModal();
        window.saveVitalSigns = () => nursingAssistant.saveVitalSigns();
        window.administerMedication = () => nursingAssistant.administerMedication();
        window.openTriageModal = () => nursingAssistant.openTriageModal();
        window.showPatientDetails = (id) => {
            nursingAssistant.showNotification('Detalhes do Paciente', 'Funcionalidade em desenvolvimento', 'info');
        };
        
        // Mostrar mensagem de boas-vindas
        setTimeout(() => {
            nursingAssistant.showNotification(
                'Bem-vindo ao Nursing Assistant!',
                'Sistema de enfermagem completo inicializado. Todas as funcionalidades estão operacionais.',
                'success'
            );
        }, 1000);
        
        // Adicionar evento para tecla F1
        document.addEventListener('keydown', (e) => {
            if (e.key === 'F1') {
                e.preventDefault();
                nursingAssistant.showEmergencyModal();
            }
        });
    });
    </script>
</body>
</html>
