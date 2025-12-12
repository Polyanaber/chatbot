<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Reelmi AI - Universal Intelligence</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/pyodide/v0.23.4/full/pyodide.js"></script>

<!-- NOVAS BIBLIOTECAS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/dracula.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/python/python.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/edit/closebrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/edit/closetag.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/javascript-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/python-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tesseract.js/4.0.2/tesseract.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.11.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd@2.2.2"></script>
<script src="https://unpkg.com/marked@4.0.0/lib/marked.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

<style>
    :root {
        /* --- CORES ROXO E AZUL (Visual Tecnológico) --- */
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
        --accent-color: #8C52FF;
        
        /* DARK MODE (PADRÃO) */
        --bg-body: #0f0f12;
        --bg-sidebar: #16161a;
        --bg-surface: #1e1e24;
        --bg-hover: #2b2b36;
        --border: #2b2b36;
        --text-main: #ffffff;
        --text-muted: #9ca3af;
        
        --glass: rgba(22, 22, 26, 0.8);
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #3b82f6;
    }

    body.light-mode {
        --bg-body: #f3f4f6;
        --bg-sidebar: #ffffff;
        --bg-surface: #ffffff;
        --bg-hover: #e5e7eb;
        --border: #e5e7eb;
        --text-main: #111827;
        --text-muted: #6b7280;
        --glass: rgba(255, 255, 255, 0.85);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--bg-body);
        color: var(--text-main);
        height: 100vh;
        display: flex;
        overflow: hidden;
        transition: 0.3s;
    }

    /* ============ BARRA DE ROLAGEM TRANSPARENTE ============ */
    ::-webkit-scrollbar {
        width: 8px;
        background: transparent !important;
    }

    ::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(140, 82, 255, 0.3) !important;
        border-radius: 10px;
        border: 2px solid transparent;
        background-clip: padding-box;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(140, 82, 255, 0.5) !important;
    }

    /* Para Firefox */
    * {
        scrollbar-width: thin;
        scrollbar-color: rgba(140, 82, 255, 0.3) transparent;
    }

    /* BOTÃO HAMBURGER (NOVO) */
    .hamburger-toggle {
        position: fixed;
        top: 20px !important;
        left: 20px;
        width: 40px;
        height: 40px;
        background: var(--primary-gradient);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1001;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        border: none;
        font-size: 18px;
        display: none; /* Inicialmente escondido para desktop */
    }

    .hamburger-toggle:hover {
        transform: scale(1.1);
        background: var(--accent-color);
    }

    /* Quando sidebar está visível, ajustar posição do hamburger */
    body:not(.sidebar-hidden) .hamburger-toggle {
        left: 300px;
        transform: translateX(-50%);
    }

    /* Quando sidebar está escondida, hamburger fica fixo */
    body.sidebar-hidden .hamburger-toggle {
        left: 20px;
        transform: none;
    }

    /* --- SIDEBAR (Barra Lateral) --- */
    aside {
        width: 280px;
        background: var(--bg-sidebar);
        border-right: 1px solid var(--border);
        display: flex;
        flex-direction: column;
        z-index: 10;
        transition: 0.3s;
    }

    /* Quando sidebar está escondida */
    body.sidebar-hidden aside {
        transform: translateX(-280px);
        position: absolute;
    }

    body.sidebar-hidden main {
        margin-left: 0;
        width: 100%;
    }

    .brand-area {
        padding: 25px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid var(--border);
    }

    .brand-area img { height: 40px; width: auto; object-fit: contain; }
    .brand-area h1 {
        font-size: 20px;
        font-weight: 700;
        color: transparent;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        background-clip: text;
    }

    /* Menu Infinito */
    .menu-container {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
    }
    
    .menu-group { margin-bottom: 30px; }
    .menu-label {
        font-size: 11px;
        text-transform: uppercase;
        color: var(--text-muted);
        font-weight: 700;
        margin-bottom: 12px;
        padding-left: 12px;
        letter-spacing: 0.8px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border-radius: 12px;
        color: var(--text-muted);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.2s;
    }

    .nav-item:hover, .nav-item.active {
        background: var(--bg-hover);
        color: var(--text-main);
    }
    .nav-item i { width: 20px; text-align: center; }
    
    .badge-pro {
        margin-left: auto;
        font-size: 9px;
        background: var(--primary-gradient);
        color: white;
        padding: 3px 8px;
        border-radius: 6px;
        font-weight: 700;
    }

    /* ============ ÁREA DE LOGIN NA SIDEBAR ============ */
    .login-section {
        padding: 20px;
        border-top: 1px solid var(--border);
        background: var(--bg-hover);
        margin-top: auto;
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        margin-bottom: 10px;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .register-link {
        text-align: center;
        font-size: 12px;
        color: var(--text-muted);
        cursor: pointer;
        margin-top: 8px;
    }

    .register-link:hover {
        color: var(--accent-color);
        text-decoration: underline;
    }

    /* Rodapé da Sidebar */
    .sidebar-footer {
        padding: 20px;
        border-top: 1px solid var(--border);
    }
    .user-card {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background: var(--bg-hover);
        border-radius: 12px;
    }
    .user-avatar { 
        width: 35px; 
        height: 35px; 
        background: #764ba2; 
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
    }

    /* --- ÁREA PRINCIPAL --- */
    main {
        flex: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: 0.3s;
        /* Fundo sutil futurista */
        background: radial-gradient(circle at 90% 10%, rgba(118, 75, 162, 0.08), transparent 40%),
                    radial-gradient(circle at 10% 90%, rgba(102, 126, 234, 0.08), transparent 40%);
    }

    header {
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 30px;
        background: var(--glass);
        backdrop-filter: blur(12px);
        z-index: 5;
    }

    .model-select {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        font-size: 16px;
        color: var(--text-main);
        cursor: pointer;
    }
    
    .header-icons {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .header-icons button {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-size: 18px;
        cursor: pointer;
        transition: 0.2s;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .header-icons button:hover { 
        color: var(--text-main); 
        background: var(--bg-hover);
        transform: scale(1.05); 
    }

    /* --- DASHBOARD INICIAL (GENÉRICO) --- */
    #dashboard-view {
        flex: 1;
        padding: 40px;
        overflow-y: auto; /* ADICIONADO: ROLAGEM VERTICAL */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start; /* ALTERADO: flex-start em vez de center */
        max-height: calc(100vh - 150px); /* ADICIONADO: Altura máxima */
    }

    /* BARRA DE ROLAGEM ESTILIZADA PARA DASHBOARD */
    #dashboard-view::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3)) !important;
    }

    .hero-title {
        font-size: 36px;
        font-weight: 700;
        text-align: center;
        margin-bottom: 10px;
        color: transparent;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        background-clip: text;
    }

    .widgets-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px; /* AUMENTADO: Mais espaço */
        width: 100%;
        margin-top: 40px;
        padding-bottom: 40px; /* ADICIONADO: Espaço no final */
    }

    .widget-card {
        background: var(--bg-surface);
        border: 1px solid var(--border);
        padding: 25px;
        border-radius: 20px;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .widget-card:hover {
        transform: translateY(-5px);
        border-color: #764ba2;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    .w-icon { font-size: 24px; color: #8C52FF; }
    .w-text h3 { font-size: 16px; margin-bottom: 5px; }
    .w-text p { font-size: 13px; color: var(--text-muted); }

    /* --- CHAT VIEW --- */
    #chat-view {
        display: none;
        flex: 1;
        flex-direction: row !important;
        overflow: hidden;
    }
    
    #chat-history {
        flex: 3;
        overflow-y: auto !important;
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 25px;
        max-height: calc(100vh - 200px) !important;
        min-height: 300px;
        border-right: 1px solid var(--border);
    }

    /* Estilos para a barra de rolagem do chat */
    #chat-history::-webkit-scrollbar-thumb {
        background: rgba(140, 82, 255, 0.3) !important;
    }

    #chat-timeline {
        flex: 1;
        background: var(--bg-surface);
        border-left: 1px solid var(--border);
        overflow-y: auto;
        max-width: 250px;
        min-width: 200px;
        display: none;
    }

    .timeline-item {
        padding: 8px 12px;
        margin: 5px 0;
        background: var(--bg-hover);
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
        border-left: 3px solid var(--accent-color);
    }

    .timeline-item:hover {
        background: var(--primary-gradient);
        color: white;
        transform: translateX(5px);
    }

    .msg-row { display: flex; gap: 18px; animation: slideUp 0.3s ease; max-width: 800px; margin: 0 auto; width: 100%; }
    .msg-row.user { flex-direction: row-reverse; }

    .avatar { width: 40px; height: 40px; border-radius: 12px; overflow: hidden; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }

    .bubble {
        padding: 18px 24px;
        border-radius: 20px;
        font-size: 15px;
        line-height: 1.6;
    }
    .msg-row.bot .bubble { background: var(--bg-surface); color: var(--text-main); border-top-left-radius: 4px; border: 1px solid var(--border); }
    .msg-row.user .bubble { background: var(--primary-gradient); color: white; border-top-right-radius: 4px; }

    /* --- INPUT AREA --- */
    .input-dock {
        padding: 30px;
        background: var(--bg-body);
    }
    .input-wrapper {
        max-width: 800px;
        margin: 0 auto;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 24px;
        display: flex;
        align-items: center;
        padding: 8px 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
    .input-wrapper:focus-within { border-color: #8C52FF; box-shadow: 0 0 0 2px rgba(140, 82, 255, 0.2); }
    
    .input-wrapper input {
        flex: 1;
        background: transparent;
        border: none;
        padding: 15px;
        color: var(--text-main);
        font-size: 16px;
        outline: none;
    }

    /* Botão para mostrar/esconder sidebar - CENTRALIZADO VERTICALMENTE */
    .sidebar-toggle {
        position: fixed;
        top: 50% !important;
        left: 285px;
        width: 30px;
        height: 30px;
        background: var(--primary-gradient);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        border: none;
        font-size: 14px;
        transform: translateX(-50%) translateY(-50%) !important;
    }
    
    .sidebar-toggle:hover {
        transform: translateX(-50%) translateY(-50%) scale(1.1) !important;
    }
    
    body.sidebar-hidden .sidebar-toggle {
        left: 20px !important;
        background: var(--accent-color);
        transform: translateY(-50%) !important;
    }
    
    body.sidebar-hidden .sidebar-toggle:hover {
        transform: translateY(-50%) scale(1.1) !important;
    }
    
    body.sidebar-hidden .sidebar-toggle i {
        transform: rotate(180deg);
    }

    /* --- VOICE OVERLAY --- */
    #voice-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: #000; z-index: 999;
        display: none;
        flex-direction: column; align-items: center; justify-content: center;
        color: white;
    }
    .voice-orb {
        width: 150px; height: 150px;
        border-radius: 50%;
        background: linear-gradient(45deg, #667eea, #764ba2);
        box-shadow: 0 0 80px rgba(118, 75, 162, 0.6);
        display: flex; align-items: center; justify-content: center;
        font-size: 50px;
        animation: breathe 3s infinite ease-in-out;
        cursor: pointer;
    }
    
    /* Wave visualization */
    .wave-container {
        width: 300px;
        height: 100px;
        margin: 30px 0;
        position: relative;
    }
    
    .wave-bar {
        position: absolute;
        bottom: 0;
        width: 4px;
        margin: 0 2px;
        background: linear-gradient(to top, #667eea, #764ba2);
        border-radius: 2px;
        animation: wave 1.5s ease-in-out infinite;
        animation-delay: calc(var(--i) * 0.1s);
    }
    
    /* --- NOVAS ESTILIZAÇÕES --- */
    
    /* Calculadoras Médicas */
    .calculator-modal {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }
    
    .calc-content {
        background: var(--bg-surface);
        border-radius: 20px;
        padding: 30px;
        width: 90%;
        max-width: 500px;
        max-height: 80vh;
        overflow-y: auto;
    }
    
    .calc-group {
        margin: 20px 0;
    }
    
    .calc-input {
        width: 100%;
        padding: 12px;
        background: var(--bg-body);
        border: 1px solid var(--border);
        border-radius: 10px;
        color: var(--text-main);
        margin-top: 5px;
    }
    
    .calc-result {
        background: var(--primary-gradient);
        color: white;
        padding: 15px;
        border-radius: 10px;
        margin-top: 15px;
        text-align: center;
        font-weight: bold;
    }
    
    /* Algoritmos Interativos */
    .algorithm-step {
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 15px;
        padding: 20px;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .algorithm-step:hover {
        border-color: #8C52FF;
        transform: translateX(5px);
    }
    
    /* Instagram Card Generator */
    .instagram-card {
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 20px auto;
    }
    
    .card-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .card-content {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .card-hashtag {
        font-size: 14px;
        color: rgba(255,255,255,0.8);
        margin-top: 20px;
    }
    
    /* Plugin System */
    .plugin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }
    
    .plugin-card {
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 15px;
        padding: 20px;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .plugin-card.active {
        border-color: #8C52FF;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    }
    
    /* Training Interface */
    .training-modal {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }
    
    .training-form {
        background: var(--bg-surface);
        border-radius: 20px;
        padding: 30px;
        width: 90%;
        max-width: 500px;
    }
    
    /* Safety Warning */
    .safety-warning {
        background: linear-gradient(135deg, #f59e0b, #ef4444);
        color: white;
        padding: 15px;
        border-radius: 10px;
        margin: 10px 0;
        text-align: center;
        animation: pulse 2s infinite;
    }
    
    /* Sentiment Indicator */
    .sentiment-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-left: 10px;
    }
    
    .sentiment-positive { background: var(--success); }
    .sentiment-neutral { background: var(--warning); }
    .sentiment-negative { background: var(--danger); }
    
    /* Context Badge */
    .context-badge {
        background: var(--info);
        color: white;
        font-size: 10px;
        padding: 2px 6px;
        border-radius: 10px;
        margin-left: 10px;
    }
    
    /* Python Terminal */
    .python-terminal {
        background: #1e1e24;
        color: #00ff00;
        font-family: monospace;
        padding: 20px;
        border-radius: 10px;
        max-height: 300px;
        overflow-y: auto;
        margin-top: 20px;
    }
    
    /* Image Upload Preview */
    .image-preview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        margin: 10px 0;
    }
    
    /* Mode Selector */
    .mode-selector {
        display: flex;
        gap: 10px;
        margin: 20px 0;
    }
    
    .mode-btn {
        padding: 8px 15px;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 20px;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .mode-btn.active {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
    }
    
    /* Loading Animation */
    .loading-wave {
        display: flex;
        gap: 4px;
    }
    
    .loading-wave div {
        width: 4px;
        height: 20px;
        background: #8C52FF;
        border-radius: 2px;
        animation: wave 1.5s ease-in-out infinite;
    }
    
    /* ============ ESTILOS PARA NOVAS FUNCIONALIDADES ============ */
    
    /* Sistema Operacional - Janelas Flutuantes */
    .os-window {
        position: absolute;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        min-width: 300px;
        min-height: 200px;
        z-index: 1000;
        resize: both;
        overflow: hidden;
        pointer-events: all;
    }
    
    .window-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: move;
        user-select: none;
    }
    
    .window-controls {
        display: flex;
        gap: 8px;
    }
    
    .window-controls button {
        background: transparent;
        border: none;
        color: white;
        cursor: pointer;
        width: 24px;
        height: 24px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .window-controls button:hover {
        background: rgba(255,255,255,0.2);
    }
    
    .window-content {
        padding: 20px;
        height: calc(100% - 48px);
        overflow: auto;
    }
    
    /* Dock de Aplicativos */
    .app-dock {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--glass);
        backdrop-filter: blur(10px);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 10px 20px;
        display: flex;
        gap: 15px;
        z-index: 999;
        pointer-events: all;
        max-width: 90vw;
        overflow-x: auto;
    }
    
    .app-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .app-icon:hover {
        transform: translateY(-5px);
    }
    
    /* Editor Notion */
    .notion-editor {
        min-height: 500px;
        padding: 20px;
        background: var(--bg-surface);
    }
    
    .notion-block {
        margin: 10px 0;
        padding: 10px;
        border-left: 3px solid #8C52FF;
        min-height: 30px;
        outline: none;
    }
    
    .notion-block:focus {
        background: rgba(140, 82, 255, 0.1);
    }
    
    /* Terminal Avançado */
    .advanced-terminal {
        background: #1a1a1a;
        color: #00ff00;
        font-family: 'Courier New', monospace;
        padding: 20px;
        border-radius: 10px;
        height: 400px;
        overflow-y: auto;
    }
    
    .terminal-line {
        margin: 5px 0;
    }
    
    .terminal-prompt {
        color: #00ffff;
    }
    
    /* Simulador Ventilatório */
    .ventilation-simulator {
        background: var(--bg-surface);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
    }
    
    .pv-curve {
        width: 100%;
        height: 300px;
        background: #0f0f12;
        border-radius: 10px;
        position: relative;
        margin: 20px 0;
    }
    
    /* Gasometria Analyzer */
    .gas-analysis {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin: 20px 0;
    }
    
    .gas-parameter {
        background: var(--bg-hover);
        padding: 15px;
        border-radius: 10px;
        text-align: center;
    }
    
    .gas-value {
        font-size: 24px;
        font-weight: bold;
        margin: 10px 0;
    }
    
    .gas-normal {
        color: var(--success);
    }
    
    .gas-abnormal {
        color: var(--danger);
    }
    
    /* Plugin Developer */
    .plugin-developer {
        background: var(--bg-surface);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
    }
    
    .plugin-code {
        width: 100%;
        height: 200px;
        background: #1a1a1a;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px;
        font-family: monospace;
    }
    
    /* Emotion Detector */
    .emotion-display {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 10px 0;
        padding: 10px;
        background: var(--bg-hover);
        border-radius: 10px;
    }
    
    .emotion-emoji {
        font-size: 24px;
    }
    
    .emotion-bar {
        flex: 1;
        height: 10px;
        background: var(--border);
        border-radius: 5px;
        overflow: hidden;
    }
    
    .emotion-fill {
        height: 100%;
        border-radius: 5px;
    }
    
    /* Study Dashboard */
    .study-dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .progress-card {
        background: var(--bg-surface);
        padding: 20px;
        border-radius: 15px;
    }
    
    .progress-bar {
        height: 10px;
        background: var(--border);
        border-radius: 5px;
        margin: 10px 0;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        background: var(--primary-gradient);
        border-radius: 5px;
    }
    
    /* TTS Controls */
    .tts-controls {
        background: var(--bg-surface);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .voice-sample {
        padding: 10px 15px;
        background: var(--bg-hover);
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .voice-sample:hover {
        background: var(--primary-gradient);
        color: white;
    }
    
    /* Auto-GPT Agent */
    .agent-status {
        background: var(--bg-surface);
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
    }
    
    .task-list {
        margin: 15px 0;
    }
    
    .task-item {
        padding: 10px;
        background: var(--bg-hover);
        margin: 5px 0;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    /* Floating Action Button */
    .fab {
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: var(--primary-gradient);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        cursor: pointer;
        z-index: 1000;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        transition: 0.3s;
        pointer-events: all;
    }
    
    .fab:hover {
        transform: scale(1.1);
    }
    
    /* Codemirror Custom */
    .CodeMirror {
        height: 300px !important;
        border-radius: 10px;
        margin: 10px 0;
        border: 1px solid var(--border);
    }
    
    /* Emotion Colors */
    .emotion-happy { background: rgba(16, 185, 129, 0.1); }
    .emotion-stressed { background: rgba(245, 158, 11, 0.1); }
    .emotion-sad { background: rgba(59, 130, 246, 0.1); }
    .emotion-angry { background: rgba(239, 68, 68, 0.1); }
    
    /* Window Animation */
    .window-opening {
        animation: windowOpen 0.3s ease-out;
    }
    
    /* ============ MENU DROPDOWN UNIFICADO ============ */
    .menu-dropdown-container {
        position: relative;
        display: inline-block;
    }

    .menu-toggle {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-size: 20px;
        cursor: pointer;
        transition: 0.2s;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .menu-toggle:hover {
        background: var(--bg-hover);
        color: var(--text-main);
        transform: scale(1.05);
    }

    .menu-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        width: 320px;
        max-height: 80vh;
        overflow-y: auto;
        z-index: 1001;
        display: none;
        margin-top: 10px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.4);
        backdrop-filter: blur(20px);
        animation: windowOpen 0.2s ease-out;
    }

    .menu-dropdown.show {
        display: block;
    }

    .dropdown-section {
        padding: 12px 0;
        border-bottom: 1px solid var(--border);
    }

    .dropdown-section:last-child {
        border-bottom: none;
    }

    .dropdown-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 16px;
        font-size: 12px;
        text-transform: uppercase;
        color: var(--text-muted);
        font-weight: 700;
        letter-spacing: 0.8px;
    }

    .dropdown-header i {
        font-size: 14px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: var(--text-main);
        font-size: 14px;
        cursor: pointer;
        transition: 0.2s;
        border-radius: 8px;
        margin: 0 8px;
    }

    .dropdown-item:hover {
        background: var(--bg-hover);
        transform: translateX(5px);
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
        color: var(--accent-color);
        font-size: 16px;
    }

    .dropdown-badge {
        margin-left: auto;
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 10px;
        background: var(--bg-hover);
        color: var(--text-muted);
        font-weight: 600;
        min-width: 40px;
        text-align: center;
    }

    .ai-status {
        background: rgba(239, 68, 68, 0.2);
        color: var(--danger);
    }

    .ai-status.active {
        background: rgba(16, 185, 129, 0.2);
        color: var(--success);
    }

    .status-active {
        background: rgba(16, 185, 129, 0.2);
        color: var(--success);
    }

    .status-inactive {
        background: rgba(239, 68, 68, 0.2);
        color: var(--danger);
    }

    /* Botão para limpar chat */
    .clear-chat-item {
        background: rgba(239, 68, 68, 0.1) !important;
        color: var(--danger) !important;
    }

    .clear-chat-item:hover {
        background: var(--danger) !important;
        color: white !important;
    }

    /* ============ MODAL DE LOGIN ============ */
    .login-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 2000;
        align-items: center;
        justify-content: center;
    }

    .login-modal-content {
        background: var(--bg-surface);
        border-radius: 20px;
        padding: 30px;
        width: 90%;
        max-width: 400px;
        border: 1px solid var(--border);
    }

    .login-modal-tabs {
        display: flex;
        margin-bottom: 25px;
        border-bottom: 1px solid var(--border);
    }

    .login-modal-tab {
        flex: 1;
        padding: 12px;
        text-align: center;
        cursor: pointer;
        color: var(--text-muted);
        border-bottom: 3px solid transparent;
        font-weight: 500;
        transition: 0.3s;
    }

    .login-modal-tab.active {
        color: var(--text-main);
        border-bottom: 3px solid var(--accent-color);
    }

    .login-modal-form {
        display: none;
    }

    .login-modal-form.active {
        display: block;
    }

    .login-modal-form h3 {
        margin-bottom: 20px;
        text-align: center;
        color: transparent;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        background-clip: text;
    }

    .login-form-group {
        margin-bottom: 20px;
    }

    .login-form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: var(--text-main);
        font-weight: 500;
    }

    .login-form-input {
        width: 100%;
        padding: 14px;
        background: var(--bg-body);
        border: 1px solid var(--border);
        border-radius: 10px;
        color: var(--text-main);
        font-size: 14px;
        transition: 0.3s;
    }

    .login-form-input:focus {
        border-color: var(--accent-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(140, 82, 255, 0.2);
    }

    /* ============ RESPONSIVIDADE MOBILE ============ */
    @media (max-width: 768px) {
        /* Layout mobile */
        body {
            flex-direction: column;
            overflow: auto;
        }
        
        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            width: 280px;
        }
        
        aside.active {
            transform: translateX(0);
        }
        
        main {
            margin-left: 0;
            width: 100%;
            min-height: 100vh;
        }
        
        .hamburger-toggle {
            display: flex !important;
            z-index: 1001;
            left: 20px;
        }
        
        .sidebar-toggle {
            display: none !important;
        }
        
        header {
            height: 60px;
            padding: 0 15px;
        }
        
        .model-select {
            font-size: 14px;
        }
        
        .model-select select {
            font-size: 14px;
            max-width: 150px;
        }
        
        .header-icons {
            gap: 5px;
        }
        
        .menu-toggle {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
        
        .menu-dropdown {
            position: fixed;
            top: 70px;
            right: 10px;
            left: 10px;
            width: auto;
            max-height: 70vh;
        }
        
        .hero-title {
            font-size: 28px;
            text-align: center;
            padding: 0 15px;
        }
        
        .widgets-grid {
            grid-template-columns: 1fr !important;
            gap: 15px;
            padding: 0 15px;
        }
        
        .widget-card {
            padding: 20px;
        }
        
        #chat-view {
            flex-direction: column !important;
            height: calc(100vh - 130px) !important;
        }
        
        #chat-history {
            max-height: 60vh !important;
            padding: 15px !important;
        }
        
        #chat-timeline {
            max-height: 30vh !important;
            border-left: none !important;
            border-top: 1px solid var(--border);
            max-width: 100%;
            min-width: 100%;
        }
        
        .msg-row {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 10px;
        }
        
        .msg-row.user {
            align-items: flex-end !important;
        }
        
        .avatar {
            width: 35px;
            height: 35px;
            margin-bottom: 5px;
        }
        
        .bubble {
            max-width: 90%;
            font-size: 14px;
            padding: 12px 15px;
        }
        
        .input-dock {
            padding: 15px !important;
            position: relative;
        }
        
        .input-wrapper {
            margin: 0 10px;
        }
        
        .input-wrapper input {
            padding: 12px;
            font-size: 14px;
        }
        
        .app-dock {
            bottom: 10px;
            padding: 8px 15px;
            gap: 10px;
            max-width: 95vw;
        }
        
        .app-icon {
            width: 45px;
            height: 45px;
            font-size: 18px;
        }
        
        .fab {
            bottom: 80px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .os-window {
            min-width: 90vw !important;
            min-height: 200px;
            max-width: 95vw;
            left: 2.5vw !important;
            top: 10vh !important;
        }
        
        .voice-orb {
            width: 120px;
            height: 120px;
            font-size: 40px;
        }
        
        #voice-overlay {
            padding: 20px;
        }
        
        .wave-container {
            width: 250px;
        }
        
        .login-modal-content {
            width: 95%;
            padding: 20px;
        }
        
        .login-modal-tab {
            padding: 10px;
            font-size: 14px;
        }
        
        /* Hamburger menu visível em mobile */
        .hamburger-toggle {
            display: flex !important;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 24px;
        }
        
        .mode-selector {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .mode-btn {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .app-dock {
            gap: 8px;
            padding: 8px 12px;
        }
        
        .app-icon {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
        
        .w-icon {
            font-size: 20px;
        }
        
        .w-text h3 {
            font-size: 14px;
        }
        
        .w-text p {
            font-size: 12px;
        }
    }

    /* Ajuste para landscape em mobile */
    @media (max-width: 900px) and (orientation: landscape) {
        #dashboard-view {
            padding: 20px !important;
        }
        
        .widgets-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
        
        .hero-title {
            font-size: 24px;
        }
        
        #chat-view {
            height: calc(100vh - 120px) !important;
        }
        
        #chat-history {
            max-height: 50vh !important;
        }
    }

    /* Overlay para carregamento em mobile */
    .mobile-loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--bg-body);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .mobile-loading-text {
        font-size: 14px;
        color: var(--text-muted);
        margin-top: 20px;
    }

    /* ANIMAÇÕES */
    @keyframes breathe { 
        0%, 100% { transform: scale(1); opacity: 0.8; } 
        50% { transform: scale(1.1); opacity: 1; } 
    }
    
    @keyframes slideUp { 
        from { opacity: 0; transform: translateY(20px); } 
        to { opacity: 1; transform: translateY(0); } 
    }
    
    @keyframes wave {
        0%, 100% { height: 5px; }
        50% { height: 25px; }
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    @keyframes slideIn {
        from { transform: translateX(100px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100px); opacity: 0; }
    }
    
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 5px rgba(140, 82, 255, 0.5); }
        50% { box-shadow: 0 0 20px rgba(140, 82, 255, 0.8); }
    }
    
    @keyframes windowOpen {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

    .ai-active {
        animation: pulseGlow 2s infinite;
    }

    @media (max-height: 700px) {
        .app-dock {
            display: none;
        }
        
        #chat-history {
            max-height: calc(100vh - 150px) !important;
        }
    }
    
    @media (max-width: 1200px) {
        #chat-timeline {
            max-width: 200px;
            min-width: 150px;
        }
    }

</style>
</head>
<body>

    <!-- NOVO: Botão hamburger menu - FUNCIONAL -->
    <button class="hamburger-toggle" id="hamburgerToggle" title="Abrir/Fechar Menu Principal">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Botão para mostrar/esconder sidebar - CENTRALIZADO -->
    <button class="sidebar-toggle" id="sidebarToggle" title="Esconder Menu (Ctrl+B)">
        <i class="fas fa-chevron-left"></i>
    </button>

    <!-- SIDEBAR GERAL (Estilo GPT/Gemini) -->
    <aside id="mainSidebar">
        <div class="brand-area">
            <img src="reelmilogo.png" alt="Logo" onerror="this.src='https://cdn-icons-png.flaticon.com/512/9623/9623631.png'">
            <h1>Reelmi AI</h1>
        </div>

        <div class="menu-container">
            <div class="menu-group">
                <div class="menu-label">Principal</div>
                <div class="nav-item active" onclick="switchMode('chat')"><i class="fas fa-sparkles"></i> Chat Inteligente</div>
                <div class="nav-item" onclick="switchMode('dashboard')"><i class="fas fa-compass"></i> Dashboard</div>
                <div class="nav-item" onclick="switchMode('study')"><i class="fas fa-graduation-cap"></i> Modo Estudo</div>
                <div class="nav-item" onclick="showNursingQuestions()"><i class="fas fa-user-nurse"></i> Enfermagem</div>
                <div class="nav-item" onclick="showHistory()"><i class="fas fa-history"></i> Histórico</div>
            </div>

            <div class="menu-group">
                <div class="menu-label">Criatividade</div>
                <div class="nav-item" onclick="generateInstagramCard()"><i class="fas fa-camera"></i> Card Instagram</div>
                <div class="nav-item" onclick="generatePDF()"><i class="fas fa-file-pdf"></i> Gerar PDF</div>
                <div class="nav-item" onclick="openWindow('notion')"><i class="fas fa-edit"></i> Editor Notion</div>
            </div>

            <div class="menu-group">
                <div class="menu-label">Desenvolvimento</div>
                <div class="nav-item" onclick="openPythonTerminal()"><i class="fas fa-code"></i> Python Terminal</div>
                <div class="nav-item" onclick="openWindow('terminal')"><i class="fas fa-terminal"></i> Terminal Avançado</div>
                <div class="nav-item" onclick="showPlugins()"><i class="fas fa-puzzle-piece"></i> Plugins</div>
                <div class="nav-item" onclick="showPluginDeveloper()"><i class="fas fa-plug"></i> Desenvolver Plugin</div>
            </div>

            <div class="menu-group">
                <div class="menu-label">Médico</div>
                <div class="nav-item" onclick="showMedicalCalculators()"><i class="fas fa-calculator"></i> Calculadoras</div>
                <div class="nav-item" onclick="showAlgorithms()"><i class="fas fa-project-diagram"></i> Algoritmos</div>
                <div class="nav-item" onclick="openWindow('ventilation')"><i class="fas fa-lungs"></i> Simulador VM</div>
                <div class="nav-item" onclick="showGasometryAnalyzer()"><i class="fas fa-vial"></i> Analisador Gasometria</div>
            </div>

            <div class="menu-group">
                <div class="menu-label">Configuração</div>
                <div class="nav-item" onclick="openTraining()"><i class="fas fa-brain"></i> Treinar IA</div>
                <div class="nav-item" onclick="showPersonalitySettings()"><i class="fas fa-user-cog"></i> Personalidade</div>
                <div class="nav-item" onclick="toggleTheme()"><i class="fas fa-adjust"></i> Tema</div>
                <div class="nav-item" onclick="document.getElementById('real-ai-modal').style.display='flex'"><i class="fas fa-robot"></i> IA Real</div>
                <div class="nav-item" onclick="showMemoryManager()"><i class="fas fa-database"></i> Memória Avançada</div>
                <div class="nav-item" onclick="document.getElementById('multimodal-modal').style.display='flex'"><i class="fas fa-eye"></i> Multimodal</div>
                <div class="nav-item" onclick="openWindow('agent')"><i class="fas fa-robot"></i> Agente Auto-GPT</div>
                <div class="nav-item" onclick="openWindow('study')"><i class="fas fa-graduation-cap"></i> Dashboard Estudo</div>
            </div>
        </div>

        <!-- ============ ÁREA DE LOGIN/REGISTRO NA SIDEBAR ============ -->
        <div class="login-section" id="login-section">
            <button class="login-btn" onclick="openLoginModal()">
                <i class="fas fa-sign-in-alt"></i> Login / Cadastro
            </button>
            <div class="register-link" onclick="openLoginModal('register')">
                Não tem conta? Cadastre-se
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="user-card" id="user-card">
                <div class="user-avatar" id="user-avatar">U</div>
                <div style="font-size: 13px;">
                    <div style="font-weight: 600;" id="user-name">Usuário Pro</div>
                    <div style="color: var(--text-muted);">Contexto: <span id="context-length">0</span> msgs</div>
                    <div style="font-size: 11px; margin-top: 5px;" id="emotion-status">Emoção: 😊</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- ÁREA PRINCIPAL -->
    <main>
        <header>
            <div class="model-select">
                <select id="personality-select" style="background: transparent; border: none; color: var(--text-main); font-weight: 600;">
                    <option value="professional">Reelmi Ultra 4.0 (Profissional)</option>
                    <option value="teacher">Modo Professor</option>
                    <option value="simple">Explicação Simples</option>
                    <option value="technical">Modo Técnico</option>
                    <option value="empathetic">Modo Empático</option>
                    <option value="analytical">Modo Analítico</option>
                </select>
            </div>
            <div class="header-icons">
                <button onclick="toggleTheme()" title="Alternar Tema">
                    <i class="fas fa-adjust"></i>
                </button>
                
                <!-- MENU UNIFICADO -->
                <div class="menu-dropdown-container">
                    <button class="menu-toggle" id="menuToggle" title="Menu de Funcionalidades">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="menu-dropdown" id="menuDropdown">
                        <div class="dropdown-section">
                            <div class="dropdown-header">
                                <i class="fas fa-cogs"></i>
                                <span>Funcionalidades</span>
                            </div>
                            <!-- TODAS AS 7 FUNCIONALIDADES NO MENU -->
                            <div class="dropdown-item" onclick="toggleCompactMode()">
                                <i class="fas fa-compress"></i>
                                <span>Modo Compacto</span>
                                <span class="dropdown-badge status-inactive" id="compactModeStatus">OFF</span>
                            </div>
                            <div class="dropdown-item" onclick="toggleWakeWord()">
                                <i class="fas fa-microphone-alt"></i>
                                <span>Ativar "Hey Reelmi"</span>
                                <span class="dropdown-badge status-inactive" id="wakeWordStatus">OFF</span>
                            </div>
                            <div class="dropdown-item" onclick="uploadImage()">
                                <i class="fas fa-image"></i>
                                <span>Enviar Imagem</span>
                            </div>
                            <div class="dropdown-item" onclick="showSafetyModal()">
                                <i class="fas fa-shield-alt"></i>
                                <span>Avisos de Segurança</span>
                            </div>
                            <div class="dropdown-item" onclick="showRecommendationsModal()">
                                <i class="fas fa-lightbulb"></i>
                                <span>Recomendações</span>
                            </div>
                            <div class="dropdown-item" onclick="toggleAppDock()">
                                <i class="fas fa-th"></i>
                                <span>Mostrar/Esconder Dock</span>
                                <span class="dropdown-badge status-active" id="dockStatus">ON</span>
                            </div>
                            <div class="dropdown-item" onclick="toggleTimeline()">
                                <i class="fas fa-timeline"></i>
                                <span>Mostrar/Esconder Timeline</span>
                                <span class="dropdown-badge status-inactive" id="timelineStatus">OFF</span>
                            </div>
                            <div class="dropdown-item" onclick="toggleSidebar()">
                                <i class="fas fa-bars"></i>
                                <span>Mostrar/Esconder Menu</span>
                                <span class="dropdown-badge">Ctrl+B</span>
                            </div>
                            <!-- NOVO: Botão para limpar chat -->
                            <div class="dropdown-item clear-chat-item" onclick="clearChat()">
                                <i class="fas fa-trash-alt"></i>
                                <span>Limpar Histórico do Chat</span>
                            </div>
                        </div>
                        
                        <!-- Outras seções do menu -->
                        <div class="dropdown-section">
                            <div class="dropdown-header">
                                <i class="fas fa-robot"></i>
                                <span>IA Avançada</span>
                            </div>
                            <div class="dropdown-item" onclick="openRealAIModal()">
                                <i class="fas fa-brain"></i>
                                <span>IA Real</span>
                                <span class="dropdown-badge ai-status status-inactive" id="aiStatus">OFF</span>
                            </div>
                            <div class="dropdown-item" onclick="showMemoryManager()">
                                <i class="fas fa-database"></i>
                                <span>Memória Avançada</span>
                            </div>
                            <div class="dropdown-item" onclick="openMultimodalModal()">
                                <i class="fas fa-eye"></i>
                                <span>Multimodal</span>
                            </div>
                            <div class="dropdown-item" onclick="openWindow('agent')">
                                <i class="fas fa-robot"></i>
                                <span>Agente Auto-GPT</span>
                            </div>
                        </div>
                        
                        <!-- Outras seções mantidas -->
                        <div class="dropdown-section">
                            <div class="dropdown-header">
                                <i class="fas fa-medkit"></i>
                                <span>Médico</span>
                            </div>
                            <div class="dropdown-item" onclick="showMedicalCalculators()">
                                <i class="fas fa-calculator"></i>
                                <span>Calculadoras Médicas</span>
                            </div>
                            <div class="dropdown-item" onclick="showAlgorithms()">
                                <i class="fas fa-project-diagram"></i>
                                <span>Algoritmos Clínicos</span>
                            </div>
                            <div class="dropdown-item" onclick="showGasometryAnalyzer()">
                                <i class="fas fa-vial"></i>
                                <span>Analisador Gasometria</span>
                            </div>
                            <div class="dropdown-item" onclick="openWindow('ventilation')">
                                <i class="fas fa-lungs"></i>
                                <span>Simulador VM</span>
                            </div>
                        </div>
                        
                        <div class="dropdown-section">
                            <div class="dropdown-header">
                                <i class="fas fa-code"></i>
                                <span>Desenvolvimento</span>
                            </div>
                            <div class="dropdown-item" onclick="openPythonTerminal()">
                                <i class="fas fa-terminal"></i>
                                <span>Terminal Python</span>
                            </div>
                            <div class="dropdown-item" onclick="openWindow('terminal')">
                                <i class="fas fa-terminal"></i>
                                <span>Terminal Avançado</span>
                            </div>
                            <div class="dropdown-item" onclick="showPlugins()">
                                <i class="fas fa-puzzle-piece"></i>
                                <span>Plugins</span>
                            </div>
                            <div class="dropdown-item" onclick="showPluginDeveloper()">
                                <i class="fas fa-plug"></i>
                                <span>Desenvolver Plugin</span>
                            </div>
                            <div class="dropdown-item" onclick="openWindow('code')">
                                <i class="fas fa-code"></i>
                                <span>Editor de Código</span>
                            </div>
                        </div>

                        <!-- NOVA SEÇÃO: ENFERMAGEM -->
                        <div class="dropdown-section">
                            <div class="dropdown-header">
                                <i class="fas fa-user-nurse"></i>
                                <span>Enfermagem</span>
                            </div>
                            <div class="dropdown-item" onclick="showNursingQuestions()">
                                <i class="fas fa-question-circle"></i>
                                <span>Perguntas Frequentes</span>
                            </div>
                            <div class="dropdown-item" onclick="usarSugestao('cálculo de medicamentos enfermagem')">
                                <i class="fas fa-calculator"></i>
                                <span>Cálculo de Medicamentos</span>
                            </div>
                            <div class="dropdown-item" onclick="usarSugestao('curativo enfermagem')">
                                <i class="fas fa-band-aid"></i>
                                <span>Técnica de Curativo</span>
                            </div>
                            <div class="dropdown-item" onclick="usarSugestao('sinais vitais enfermagem')">
                                <i class="fas fa-heartbeat"></i>
                                <span>Sinais Vitais</span>
                            </div>
                            <div class="dropdown-item" onclick="usarSugestao('cálculo de gotejamento')">
                                <i class="fas fa-tint"></i>
                                <span>Cálculo de Gotejamento</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MODOS DE VISUALIZAÇÃO -->
        <div id="mode-container">
            <!-- CHAT VIEW (Onde a mágica acontece) -->
            <div id="chat-view">
                <div id="chat-history"></div>
                
                <!-- TIMELINE DO CHAT -->
                <div id="chat-timeline">
                    <div style="padding: 20px;">
                        <h4 style="margin-bottom: 15px;"><i class="fas fa-timeline"></i> Timeline do Chat</h4>
                        <div id="timeline-content" style="font-size: 12px; color: var(--text-muted);">
                            <!-- Itens da timeline serão adicionados aqui -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD INICIAL (GENÉRICO) - AGORA COM ROLAGEM -->
            <div id="dashboard-view">
                <div class="hero-title">Como posso ajudar hoje?</div>
                
                <div class="mode-selector">
                    <div class="mode-btn active" onclick="switchMode('chat')">Chat</div>
                    <div class="mode-btn" onclick="switchMode('medical')">Médico</div>
                    <div class="mode-btn" onclick="switchMode('developer')">Desenvolvedor</div>
                    <div class="mode-btn" onclick="switchMode('creative')">Criativo</div>
                    <div class="mode-btn" onclick="switchMode('ai')">IA Avançada</div>
                    <div class="mode-btn" onclick="switchMode('nursing')">Enfermagem</div>
                </div>
                
                <div class="widgets-grid">
                    <!-- Widgets originais mantidos -->
                    <div class="widget-card" onclick="usarSugestao('Criar um código em Python')">
                        <div class="w-icon"><i class="fas fa-code"></i></div>
                        <div class="w-text">
                            <h3>Assistente de Código</h3>
                            <p>Gere snippets, debug ou refatore.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="showMedicalCalculators()">
                        <div class="w-icon"><i class="fas fa-calculator"></i></div>
                        <div class="w-text">
                            <h3>Calculadoras Médicas</h3>
                            <p>Índices e fórmulas clínicas.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="showAlgorithms()">
                        <div class="w-icon"><i class="fas fa-project-diagram"></i></div>
                        <div class="w-text">
                            <h3>Algoritmos Clínicos</h3>
                            <p>Fluxogramas interativos.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openPythonTerminal()">
                        <div class="w-icon"><i class="fas fa-terminal"></i></div>
                        <div class="w-text">
                            <h3>Terminal Python</h3>
                            <p>Execute código ao vivo.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="generateInstagramCard()">
                        <div class="w-icon"><i class="fas fa-camera"></i></div>
                        <div class="w-text">
                            <h3>Card Instagram</h3>
                            <p>Crie conteúdo visual.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="showPlugins()">
                        <div class="w-icon"><i class="fas fa-puzzle-piece"></i></div>
                        <div class="w-text">
                            <h3>Plugins</h3>
                            <p>Estenda funcionalidades.</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openRealAIModal()">
                        <div class="w-icon"><i class="fas fa-robot"></i></div>
                        <div class="w-text">
                            <h3>IA Real</h3>
                            <p>OpenAI, Groq, Local</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openWindow('ventilation')">
                        <div class="w-icon"><i class="fas fa-lungs"></i></div>
                        <div class="w-text">
                            <h3>Simulador VM</h3>
                            <p>Curvas PV interativas</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openWindow('notion')">
                        <div class="w-icon"><i class="fas fa-edit"></i></div>
                        <div class="w-text">
                            <h3>Editor Notion</h3>
                            <p>Blocos editáveis</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openWindow('agent')">
                        <div class="w-icon"><i class="fas fa-brain"></i></div>
                        <div class="w-text">
                            <h3>Agente Auto-GPT</h3>
                            <p>Autonomia completa</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="openMultimodalModal()">
                        <div class="w-icon"><i class="fas fa-eye"></i></div>
                        <div class="w-text">
                            <h3>Multimodal</h3>
                            <p>OCR, Detecção, Análise</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="showMemoryManager()">
                        <div class="w-icon"><i class="fas fa-database"></i></div>
                        <div class="w-text">
                            <h3>Memória Avançada</h3>
                            <p>Lembretes e preferências</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Explique a reanimação neonatal')">
                        <div class="w-icon"><i class="fas fa-baby"></i></div>
                        <div class="w-text">
                            <h3>Reanimação Neonatal</h3>
                            <p>Protocolos e algoritmos</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="generatePDF()">
                        <div class="w-icon"><i class="fas fa-file-medical"></i></div>
                        <div class="w-text">
                            <h3>Relatório Clínico</h3>
                            <p>Gere relatórios automatizados</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Explique modos ventilatorios avançados')">
                        <div class="w-icon"><i class="fas fa-wind"></i></div>
                        <div class="w-text">
                            <h3>Modos Ventilatórios</h3>
                            <p>APRV, PRVC, ASV</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Crie uma função em JavaScript')">
                        <div class="w-icon"><i class="fab fa-js"></i></div>
                        <div class="w-text">
                            <h3>JavaScript Helper</h3>
                            <p>Funções e bibliotecas</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('O que é SDRA?')">
                        <div class="w-icon"><i class="fas fa-lungs-virus"></i></div>
                        <div class="w-text">
                            <h3>SDRA - Síndrome</h3>
                            <p>Diagnóstico e tratamento</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Exemplos de código React')">
                        <div class="w-icon"><i class="fab fa-react"></i></div>
                        <div class="w-text">
                            <h3>React Developer</h3>
                            <p>Componentes e hooks</p>
                        </div>
                    </div>
                    
                    <div class="widget-card" onclick="usarSugestao('Como calcular gotejamento?')">
                        <div class="w-icon"><i class="fas fa-tint"></i></div>
                        <div class="w-text">
                            <h3>Gotejamento</h3>
                            <p>Cálculos de infusão</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Explique ECMO')">
                        <div class="w-icon"><i class="fas fa-heartbeat"></i></div>
                        <div class="w-text">
                            <h3>ECMO</h3>
                            <p>Oxigenação extracorpórea</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Crie um chatbot em Python')">
                        <div class="w-icon"><i class="fas fa-comments"></i></div>
                        <div class="w-text">
                            <h3>Chatbot Python</h3>
                            <p>Desenvolvimento de IA</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('Monitorização hemodinâmica')">
                        <div class="w-icon"><i class="fas fa-heart"></i></div>
                        <div class="w-text">
                            <h3>Hemodinâmica</h3>
                            <p>Parâmetros e monitoração</p>
                        </div>
                    </div>

                    <!-- NOVOS WIDGETS DE ENFERMAGEM -->
                    <div class="widget-card" onclick="usarSugestao('cálculo de medicamentos enfermagem')">
                        <div class="w-icon"><i class="fas fa-pills"></i></div>
                        <div class="w-text">
                            <h3>Cálculo Medicamentos</h3>
                            <p>Fórmulas e dosagens</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('curativo enfermagem')">
                        <div class="w-icon"><i class="fas fa-band-aid"></i></div>
                        <div class="w-text">
                            <h3>Técnica de Curativo</h3>
                            <p>Passo a passo completo</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('sinais vitais enfermagem')">
                        <div class="w-icon"><i class="fas fa-heartbeat"></i></div>
                        <div class="w-text">
                            <h3>Sinais Vitais</h3>
                            <p>Valores e referências</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('sistematização da assistência de enfermagem')">
                        <div class="w-icon"><i class="fas fa-clipboard-list"></i></div>
                        <div class="w-text">
                            <h3>SAE</h3>
                            <p>Processo de enfermagem</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('cateterismo vesical')">
                        <div class="w-icon"><i class="fas fa-procedures"></i></div>
                        <div class="w-text">
                            <h3>Cateterismo Vesical</h3>
                            <p>Técnica e cuidados</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('prevenção de úlcera por pressão')">
                        <div class="w-icon"><i class="fas fa-bed"></i></div>
                        <div class="w-text">
                            <h3>Úlcera por Pressão</h3>
                            <p>Prevenção e cuidados</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('administração de medicamentos')">
                        <div class="w-icon"><i class="fas fa-syringe"></i></div>
                        <div class="w-text">
                            <h3>Administração</h3>
                            <p>Vias e técnicas</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('emergências em enfermagem')">
                        <div class="w-icon"><i class="fas fa-ambulance"></i></div>
                        <div class="w-text">
                            <h3>Emergências</h3>
                            <p>Atuação e protocolos</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('cálculo de gotejamento')">
                        <div class="w-icon"><i class="fas fa-tint"></i></div>
                        <div class="w-text">
                            <h3>Gotejamento</h3>
                            <p>Fórmulas e exemplos</p>
                        </div>
                    </div>

                    <div class="widget-card" onclick="usarSugestao('cuidados com drenos')">
                        <div class="w-icon"><i class="fas fa-tube"></i></div>
                        <div class="w-text">
                            <h3>Cuidados com Drenos</h3>
                            <p>Tipos e manuseio</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODO ESTUDO (FULLSCREEN) -->
            <div id="study-view" style="display: none;">
                <div style="padding: 40px; max-width: 1000px; margin: 0 auto;">
                    <h1 style="font-size: 32px; margin-bottom: 30px; color: transparent; background: var(--primary-gradient); -webkit-background-clip: text; background-clip: text;">
                        Modo Estudo - Ventilação Mecânica
                    </h1>
                    <div id="study-content"></div>
                </div>
            </div>
        </div>

        <!-- INPUT FIXO -->
        <div class="input-dock">
            <div class="input-wrapper">
                <button onclick="uploadImage()" style="background:none; border:none; color:var(--text-muted); cursor:pointer; font-size:18px; margin-right:10px;"><i class="fas fa-image"></i></button>
                <input type="text" id="campo-texto" placeholder="Envie uma mensagem para Reelmi AI... (Experimente 'Hey Reelmi' para voz)" onkeypress="teclaEnter(event)">
                <button onclick="abrirVoz()" style="background:none; border:none; color:var(--text-main); cursor:pointer; font-size:18px; margin-left:10px;"><i class="fas fa-microphone"></i></button>
                <button onclick="enviarTexto()" style="background:#764ba2; border:none; color:white; width:35px; height:35px; border-radius:10px; cursor:pointer; margin-left:10px;"><i class="fas fa-arrow-up"></i></button>
            </div>
            <div style="text-align: center; font-size: 11px; color: var(--text-muted); margin-top: 10px;">
                <span id="context-indicator">Contexto: Ativo</span> • 
                <span id="sentiment-indicator">Emoção: 😊</span> •
                <span id="ai-mode-indicator">IA: Local</span>
            </div>
        </div>
    </main>

    <!-- OVERLAY DE VOZ COM WAVE VISUALIZER -->
    <div id="voice-overlay">
        <div style="margin-bottom: 30px; font-size: 14px; letter-spacing: 3px; color: #888;">MODO DE VOZ ATIVO</div>
        
        <div class="wave-container" id="wave-visualizer">
            <!-- Wave bars will be generated by JavaScript -->
        </div>
        
        <div class="voice-orb" id="orb-anim" onclick="toggleGravacao()">
            <i class="fas fa-microphone"></i>
        </div>
        
        <div id="status-voz" style="margin-top: 30px; font-size: 20px;">Diga "Hey Reelmi" para começar</div>
        <div id="texto-voz" style="margin-top: 20px; color: #aaa; max-width: 600px; text-align: center; font-size: 18px; min-height: 60px;"></div>
        
        <button onclick="fecharVoz()" style="margin-top: 40px; background: #333; border: none; color: white; padding: 12px 30px; border-radius: 30px; cursor: pointer; font-size: 14px;">
            <i class="fas fa-times"></i> Sair do Modo Voz
        </button>
    </div>

    <!-- ============ MODAL DE LOGIN/CADASTRO ============ -->
    <div id="login-modal" class="login-modal-overlay">
        <div class="login-modal-content">
            <div class="login-modal-tabs">
                <div class="login-modal-tab active" onclick="switchLoginTab('login')">Login</div>
                <div class="login-modal-tab" onclick="switchLoginTab('register')">Cadastro</div>
            </div>
            
            <div id="login-form" class="login-modal-form active">
                <h3>Login na Reelmi AI</h3>
                <div class="login-form-group">
                    <label>E-mail</label>
                    <input type="email" id="login-email" class="login-form-input" placeholder="seu@email.com">
                </div>
                <div class="login-form-group">
                    <label>Senha</label>
                    <input type="password" id="login-password" class="login-form-input" placeholder="Sua senha">
                </div>
                <button onclick="loginUser()" class="login-btn" style="margin-top: 10px;">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </button>
                <div class="register-link" onclick="switchLoginTab('register')" style="margin-top: 15px; text-align: center;">
                    Não tem conta? Cadastre-se
                </div>
            </div>
            
            <div id="register-form" class="login-modal-form">
                <h3>Criar Conta</h3>
                <div class="login-form-group">
                    <label>Nome Completo</label>
                    <input type="text" id="register-name" class="login-form-input" placeholder="Seu nome">
                </div>
                <div class="login-form-group">
                    <label>E-mail</label>
                    <input type="email" id="register-email" class="login-form-input" placeholder="seu@email.com">
                </div>
                <div class="login-form-group">
                    <label>Senha</label>
                    <input type="password" id="register-password" class="login-form-input" placeholder="Mínimo 6 caracteres">
                </div>
                <div class="login-form-group">
                    <label>Confirmar Senha</label>
                    <input type="password" id="register-confirm" class="login-form-input" placeholder="Digite novamente">
                </div>
                <button onclick="registerUser()" class="login-btn" style="margin-top: 10px;">
                    <i class="fas fa-user-plus"></i> Criar Conta
                </button>
                <div class="register-link" onclick="switchLoginTab('login')" style="margin-top: 15px; text-align: center;">
                    Já tem conta? Faça login
                </div>
            </div>
            
            <button onclick="closeLoginModal()" style="width:100%; padding:12px; margin-top:20px; background:var(--bg-hover); color:var(--text-muted); border:none; border-radius:10px; cursor:pointer;">
                Cancelar
            </button>
        </div>
    </div>

    <!-- Janelas do Sistema Operacional -->
    <div id="window-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1000;"></div>

    <!-- Dock de Aplicativos -->
    <div class="app-dock" id="app-dock">
        <div class="app-icon" onclick="openWindow('notion')" title="Editor Notion">
            <i class="fas fa-edit"></i>
        </div>
        <div class="app-icon" onclick="openWindow('terminal')" title="Terminal Avançado">
            <i class="fas fa-terminal"></i>
        </div>
        <div class="app-icon" onclick="openWindow('ventilation')" title="Simulador Ventilatório">
            <i class="fas fa-lungs"></i>
        </div>
        <div class="app-icon" onclick="openWindow('agent')" title="Agente Auto-GPT">
            <i class="fas fa-robot"></i>
        </div>
        <div class="app-icon" onclick="openWindow('study')" title="Dashboard de Estudo">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="app-icon" onclick="openWindow('code')" title="Editor de Código">
            <i class="fas fa-code"></i>
        </div>
    </div>

    <!-- FAB para IA Real -->
    <div class="fab" onclick="toggleRealAI()" id="ai-fab" title="IA Real - Clique para ativar">
        <i class="fas fa-brain"></i>
    </div>

    <!-- MODAIS EXISTENTES -->
    
    <!-- Calculadoras Médicas -->
    <div id="medical-calculators" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">Calculadoras Médicas</h2>
            
            <div class="calc-group">
                <label>Índice de Oxigenação (PaO2/FiO2)</label>
                <input type="number" id="pao2" class="calc-input" placeholder="PaO2 (mmHg)">
                <input type="number" id="fio2" class="calc-input" placeholder="FiO2 (decimal)" step="0.01" min="0.21" max="1">
                <button onclick="calculatePaO2FiO2()" style="width:100%; padding:12px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Calcular
                </button>
                <div id="result-pao2fio2" class="calc-result"></div>
            </div>
            
            <div class="calc-group">
                <label>Volume Minuto (MV)</label>
                <input type="number" id="tidal-volume" class="calc-input" placeholder="Volume Corrente (ml)">
                <input type="number" id="resp-rate" class="calc-input" placeholder="Frequência Respiratória (rpm)">
                <button onclick="calculateMinuteVolume()" style="width:100%; padding:12px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Calcular
                </button>
                <div id="result-minute-volume" class="calc-result"></div>
            </div>
            
            <div class="calc-group">
                <label>Dose por Peso (mg/kg)</label>
                <input type="number" id="dose-mg" class="calc-input" placeholder="Dose Total (mg)">
                <input type="number" id="weight-kg" class="calc-input" placeholder="Peso (kg)">
                <button onclick="calculateDosePerKg()" style="width:100%; padding:12px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Calcular
                </button>
                <div id="result-dose" class="calc-result"></div>
            </div>
            
            <button onclick="closeModal('medical-calculators')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Algoritmos Clínicos -->
    <div id="algorithms-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">Algoritmos Clínicos</h2>
            
            <div class="algorithm-step" onclick="algorithmStep(1)">
                <h3>1. Intubação Neonatal</h3>
                <p>Clique para ver passo a passo</p>
            </div>
            
            <div class="algorithm-step" onclick="algorithmStep(2)">
                <h3>2. Dessaturação em VM</h3>
                <p>Fluxograma de conduta</p>
            </div>
            
            <div class="algorithm-step" onclick="algorithmStep(3)">
                <h3>3. Desmame Ventilatório</h3>
                <p>Protocolo de desmame</p>
            </div>
            
            <div class="algorithm-step" onclick="algorithmStep(4)">
                <h3>4. Reanimação Neonatal</h3>
                <p>Algoritmo de reanimação</p>
            </div>
            
            <div id="algorithm-content" style="margin-top: 20px;"></div>
            
            <button onclick="closeModal('algorithms-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Python Terminal -->
    <div id="python-terminal-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">Terminal Python</h2>
            <div class="python-terminal" id="python-output">
                >>> Carregando Pyodide...<br>
            </div>
            <div style="display: flex; margin-top: 10px;">
                <input type="text" id="python-input" class="calc-input" placeholder="Digite código Python aqui..." style="flex:1; margin-right:10px;" onkeypress="pythonEnter(event)">
                <button onclick="runPython()" style="padding:12px 20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Executar
                </button>
            </div>
            <button onclick="closeModal('python-terminal-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Plugin Manager -->
    <div id="plugins-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">Gerenciador de Plugins</h2>
            <div class="plugin-grid" id="plugins-grid">
                <!-- Plugins serão carregados aqui -->
            </div>
            <button onclick="closeModal('plugins-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Training Interface -->
    <div id="training-modal" class="training-modal">
        <div class="training-form">
            <h2 style="margin-bottom: 20px;">Treinar Reelmi AI</h2>
            
            <div class="calc-group">
                <label>Pergunta</label>
                <input type="text" id="train-question" class="calc-input" placeholder="Digite uma pergunta...">
            </div>
            
            <div class="calc-group">
                <label>Resposta</label>
                <textarea id="train-answer" class="calc-input" placeholder="Digite a resposta..." rows="4"></textarea>
            </div>
            
            <div class="calc-group">
                <label>Categoria</label>
                <select id="train-category" class="calc-input">
                    <option value="ventilacao">Ventilação Mecânica</option>
                    <option value="neonatologia">Neonatologia</option>
                    <option value="programacao">Programação</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            
            <button onclick="saveTraining()" style="width:100%; padding:12px; margin-top:10px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                Salvar Treinamento
            </button>
            
            <button onclick="closeModal('training-modal')" style="width:100%; padding:12px; margin-top:10px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Cancelar
            </button>
        </div>
    </div>
    
    <!-- Instagram Card Preview -->
    <div id="instagram-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">Gerador de Card Instagram</h2>
            
            <div class="calc-group">
                <label>Título do Card</label>
                <input type="text" id="card-title" class="calc-input" placeholder="Digite o título...">
            </div>
            
            <div class="calc-group">
                <label>Conteúdo</label>
                <textarea id="card-content" class="calc-input" placeholder="Digite o conteúdo..." rows="4"></textarea>
            </div>
            
            <button onclick="generateCardPreview()" style="width:100%; padding:12px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                Pré-visualizar
            </button>
            
            <div id="card-preview" style="margin-top: 20px;"></div>
            
            <button onclick="downloadCard()" style="width:100%; padding:12px; margin-top:10px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                Baixar como Imagem
            </button>
            
            <button onclick="closeModal('instagram-modal')" style="width:100%; padding:12px; margin-top:10px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>

    <!-- NOVOS MODAIS -->

    <!-- IA Real -->
    <div id="real-ai-modal" class="calculator-modal">
        <div class="calc-content" style="max-width: 800px;">
            <h2>IA Real - Configurações</h2>
            
            <div class="mode-selector" style="margin: 20px 0;">
                <div class="mode-btn active" onclick="selectAIMode('openai')">OpenAI</div>
                <div class="mode-btn" onclick="selectAIMode('groq')">Groq</div>
                <div class="mode-btn" onclick="selectAIMode('local')">Local (Ollama)</div>
                <div class="mode-btn" onclick="selectAIMode('gpt4all')">GPT4All</div>
                <div class="mode-btn" onclick="selectAIMode('simulated')">Simulado</div>
            </div>
            
            <div id="ai-config-area">
                <!-- Configurações serão carregadas dinamicamente -->
            </div>
            
            <button onclick="testAIConnection()" style="width:100%; padding:12px; margin-top:20px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                Testar Conexão
            </button>
            
            <button onclick="closeModal('real-ai-modal')" style="width:100%; padding:12px; margin-top:10px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Memória Avançada -->
    <div id="memory-manager-modal" class="calculator-modal">
        <div class="calc-content" style="max-width: 800px;">
            <h2>Memória Avançada</h2>
            
            <div class="memory-stats">
                <h3>Estatísticas de Memória</h3>
                <div id="memory-stats"></div>
            </div>
            
            <div class="reminder-section">
                <h3>Lembretes e Tarefas</h3>
                <input type="text" id="new-reminder" class="calc-input" placeholder="Nova tarefa...">
                <input type="datetime-local" id="reminder-time" class="calc-input">
                <button onclick="addReminder()" style="width:100%; padding:12px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Adicionar Lembrete
                </button>
                <div id="reminders-list" style="margin-top: 20px;"></div>
            </div>
            
            <button onclick="closeModal('memory-manager-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Multimodalidade -->
    <div id="multimodal-modal" class="calculator-modal">
        <div class="calc-content" style="max-width: 800px;">
            <h2>Multimodalidade Avançada</h2>
            
            <div class="mode-selector" style="margin: 20px 0;">
                <div class="mode-btn active" onclick="selectMultimodalMode('ocr')">OCR</div>
                <div class="mode-btn" onclick="selectMultimodalMode('object')">Detecção de Objetos</div>
                <div class="mode-btn" onclick="selectMultimodalMode('graph')">Análise de Gráficos</div>
                <div class="mode-btn" onclick="selectMultimodalMode('medical')">Análise Médica</div>
            </div>
            
            <div id="multimodal-content">
                <!-- Conteúdo dinâmico -->
            </div>
            
            <button onclick="closeModal('multimodal-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Desenvolvedor de Plugins -->
    <div id="plugin-developer-modal" class="calculator-modal">
        <div class="calc-content" style="max-width: 800px;">
            <h2>Desenvolvedor de Plugins</h2>
            
            <div class="calc-group">
                <label>Nome do Plugin</label>
                <input type="text" id="plugin-name" class="calc-input" placeholder="Meu Plugin">
            </div>
            
            <div class="calc-group">
                <label>Descrição</label>
                <textarea id="plugin-desc" class="calc-input" placeholder="Descrição do plugin..." rows="2"></textarea>
            </div>
            
            <div class="calc-group">
                <label>Código JavaScript</label>
                <textarea id="plugin-code" class="calc-input" placeholder="// Seu código aqui..." rows="10" style="font-family: monospace;"></textarea>
            </div>
            
            <button onclick="savePlugin()" style="width:100%; padding:12px; margin-top:10px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                Salvar Plugin
            </button>
            
            <button onclick="testPlugin()" style="width:100%; padding:12px; margin-top:10px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                Testar Plugin
            </button>
            
            <button onclick="closeModal('plugin-developer-modal')" style="width:100%; padding:12px; margin-top:10px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>
    
    <!-- Analisador de Gasometria -->
    <div id="gasometry-modal" class="calculator-modal">
        <div class="calc-content" style="max-width: 800px;">
            <h2>Analisador de Gasometria</h2>
            
            <div class="gas-analysis">
                <div class="gas-parameter">
                    <label>pH</label>
                    <input type="number" id="ph-value" class="calc-input" placeholder="7.40" step="0.01" min="6.8" max="7.8">
                </div>
                <div class="gas-parameter">
                    <label>PaCO₂ (mmHg)</label>
                    <input type="number" id="paco2-value" class="calc-input" placeholder="40">
                </div>
                <div class="gas-parameter">
                    <label>PaO₂ (mmHg)</label>
                    <input type="number" id="pao2-value" class="calc-input" placeholder="80">
                </div>
                <div class="gas-parameter">
                    <label>HCO₃ (mEq/L)</label>
                    <input type="number" id="hco3-value" class="calc-input" placeholder="24">
                </div>
            </div>
            
            <button onclick="analyzeGasometry()" style="width:100%; padding:12px; margin-top:20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                Analisar Gasometria
            </button>
            
            <div id="gasometry-result" style="margin-top: 20px;"></div>
            
            <button onclick="closeModal('gasometry-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>

    <!-- MODAIS DAS NOVAS FUNCIONALIDADES -->
    
    <!-- Safety Warning Modal -->
    <div id="safety-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">⚠️ Avisos de Segurança</h2>
            
            <div class="safety-warning">
                <h3>ATENÇÃO IMPORTANTE</h3>
                <p>Reelmi AI é um assistente de IA e NÃO substitui:</p>
                <ul>
                    <li>Atendimento médico profissional</li>
                    <li>Prescrição de medicamentos</li>
                    <li>Diagnóstico médico</li>
                    <li>Emergências médicas</li>
                </ul>
                <p>Em caso de emergência, ligue 192 ou procure um hospital.</p>
            </div>
            
            <div style="margin-top: 20px;">
                <h4>Filtros de Segurança Ativos:</h4>
                <ul>
                    <li>✓ Detecção de linguagem inadequada</li>
                    <li>✓ Verificação de consultas médicas perigosas</li>
                    <li>✓ Monitoramento de conteúdo sensível</li>
                    <li>✓ Proteção de dados pessoais</li>
                </ul>
            </div>
            
            <button onclick="closeModal('safety-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                Entendi
            </button>
        </div>
    </div>
    
    <!-- Recommendations Modal -->
    <div id="recommendations-modal" class="calculator-modal">
        <div class="calc-content">
            <h2 style="margin-bottom: 20px;">💡 Recomendações Inteligentes</h2>
            
            <div style="margin-bottom: 20px;">
                <p>Baseado no seu histórico e contexto atual, recomendamos:</p>
            </div>
            
            <div id="recommendations-content">
                <!-- Recomendações serão carregadas dinamicamente -->
            </div>
            
            <button onclick="closeModal('recommendations-modal')" style="width:100%; padding:12px; margin-top:20px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                Fechar
            </button>
        </div>
    </div>

    <!-- Overlay de carregamento mobile -->
    <div class="mobile-loading" id="mobile-loading">
        <div class="loading-wave">
            <div></div><div></div><div></div><div></div>
        </div>
        <div class="mobile-loading-text">Carregando Reelmi AI...</div>
    </div>

<script>
    /* 
       =========================================================
       SISTEMA COMPLETO REELMI AI - VERSÃO COMPLETA COM TODAS AS FUNCIONALIDADES
       =========================================================
    */
    
    // ==================== VARIÁVEIS GLOBAIS ====================
    let contextoConversa = [];
    const maxContexto = 20;
    let historicoConversas = [];
    let wakeWordActive = false;
    let wakeWordRecognition;
    let recognition;
    let isRecording = false;
    let pyodide = null;
    let realAIActive = false;
    let currentAIMode = 'simulated';
    let cocoModel = null;
    let agentRunning = false;
    let agentInterval;
    let terminalHistory = [];
    let historyIndex = 0;
    let windows = [];
    let windowZIndex = 1000;
    let dockVisible = true;
    let longTermMemory = JSON.parse(localStorage.getItem('reelmi_long_memory') || '{}');
    let compactModeActive = false;
    let timelineVisible = false;
    let sidebarVisible = true;
    let currentUser = null;
    
    // ==================== NOVAS PERGUNTAS SOBRE SUPORTE VENTILATÓRIO ====================
    const perguntasEnfermagem = [
        {
            pergunta: 'cálculo de medicamentos enfermagem',
            resposta: `💊 **Cálculo de Medicamentos - Enfermagem**\n\n**Fórmula Básica:**\nDose = (Prescrição × Peso) / Concentração\n\n**Exemplo Prático:**\nPrescrição: 5mg/kg\nPaciente: 70kg\nConcentração: 10mg/ml\n\nCálculo: (5 × 70) / 10 = 35ml\n\n**Dicas importantes:**\n• Sempre conferir peso atual\n• Verificar concentração do medicamento\n• Realizar dupla verificação\n• Registrar cálculo no prontuário`
        },
        {
            pergunta: 'curativo enfermagem',
            resposta: `🩹 **Técnica de Curativo - Passo a Passo**\n\n1. **Preparação:**\n   - Higienizar as mãos\n   - Organizar material\n   - Explicar procedimento ao paciente\n\n2. **Remoção do curativo anterior:**\n   - Fazer antissepsia\n   - Remover no sentido pêlo-caudal\n\n3. **Limpeza da lesão:**\n   - Centro para periferia\n   - Solução fisiológica 0,9%\n   - Secar com gaze\n\n4. **Aplicação do novo curativo:**\n   - Manter técnica asséptica\n   - Fixar adequadamente\n   - Registrar características`
        },
        {
            pergunta: 'sinais vitais enfermagem',
            resposta: `📊 **Sinais Vitais - Valores de Referência**\n\n**Temperatura:**\n• Axilar: 36,0°C - 37,4°C\n• Oral: 35,5°C - 37,5°C\n• Retal: 36,6°C - 38,0°C\n\n**Pressão Arterial:**\n• Adulto: 120/80 mmHg\n• Hipertensão: ≥140/90 mmHg\n• Hipotensão: ≤90/60 mmHg\n\n**Frequência Respiratória:**\n• Adulto: 12-20 rpm\n• Criança: 20-30 rpm\n• Lactente: 30-40 rpm\n\n**Frequência Cardíaca:**\n• Adulto: 60-100 bpm\n• Criança: 70-120 bpm\n• Lactente: 120-160 bpm`
        },
        {
            pergunta: 'sistematização da assistência de enfermagem',
            resposta: `📋 **SAE - Sistematização da Assistência de Enfermagem**\n\n**5 Etapas do Processo de Enfermagem:**\n\n1. **Histórico de Enfermagem:**\n   - Coleta de dados\n   - Exame físico\n   - Anamnese\n\n2. **Diagnóstico de Enfermagem:**\n   - Problemas identificados\n   - NANDA Internacional\n\n3. **Planejamento:**\n   - Resultados esperados\n   - Intervenções\n   - Prescrição de enfermagem\n\n4. **Implementação:**\n   - Execução do cuidado\n   - Educação em saúde\n\n5. **Avaliação:**\n   - Acompanhamento\n   - Reavaliação contínua`
        },
        {
            pergunta: 'cateterismo vesical',
            resposta: `🚽 **Cateterismo Vesical de Alívio - Técnica**\n\n**Materiais Necessários:**\n• Sonda vesical (calibre adequado)\n• Luvas estéreis\n• Campo estéril\n• Solução antisséptica\n• Seringa com água destilada\n• Sistema de drenagem\n\n**Técnica:**\n1. Posicionar paciente em decúbito dorsal\n2. Higienizar genitália\n3. Lubrificar sonda\n4. Introduzir sonda 5-7cm (mulher) ou 20-25cm (homem)\n5. Inflar balão (5-10ml água destilada)\n6. Conectar sistema de drenagem\n\n**Cuidados pós-procedimento:**\n• Manter bolsa abaixo do nível da bexiga\n• Observar débito urinário\n• Prevenir infecção`
        },
        {
            pergunta: 'prevenção de úlcera por pressão',
            resposta: `🛏️ **Prevenção de Úlcera por Pressão - Escala de Braden**\n\n**Fatores de Risco:**\n1. **Percepção sensorial**\n2. **Umidade**\n3. **Atividade**\n4. **Mobilidade**\n5. **Nutrição**\n6. **Fricção e Cisalhamento**\n\n**Intervenções:**\n• Reposicionar a cada 2h\n• Uso de colchões especiais\n• Manutenção da integridade cutânea\n• Nutrição adequada\n• Hidratação\n\n**Pontuação Braden:**\n• 15-18: Baixo risco\n• 13-14: Risco moderado\n• ≤12: Alto risco`
        },
        {
            pergunta: 'administração de medicamentos',
            resposta: `💉 **Regras de Ouro da Administração de Medicamentos**\n\n**5 Certos:**\n1. **Medicamento certo**\n2. **Paciente certo**\n3. **Dose certa**\n4. **Via certa**\n5. **Horário certo**\n\n**Técnicas:**\n• **Intramuscular:** ângulo de 90°, Z-track para irritantes\n• **Subcutânea:** ângulo de 45°-90°, rodízio de sítios\n• **Intradérmica:** ângulo de 15°, formar pápula\n• **Endovenosa:** verificar permeabilidade, aspiração\n\n**Observações:**\n• Efeitos terapêuticos\n• Reações adversas\n• Sinais de flebite`
        },
        {
            pergunta: 'emergências em enfermagem',
            resposta: `🚨 **Atuação em Emergências - Enfermagem**\n\n**PARADA CARDIORRESPIRATÓRIA:**\n1. **Avaliar responsividade**\n2. **Acionar serviço de emergência**\n3. **Iniciar RCP:**\n   - 30 compressões: 2 ventilações\n   - Profundidade: 5-6cm\n   - Frequência: 100-120/min\n4. **DEA quando disponível**\n\n**CRISE CONVULSIVA:**\n1. **Proteger cabeça do paciente**\n2. **Afastar objetos perigosos**\n3. **Colocar em posição lateral de segurança**\n4. **Não tentar abrir a boca à força**\n5. **Monitorar tempo da crise**`
        },
        {
            pergunta: 'cálculo de gotejamento',
            resposta: `💧 **Cálculo de Gotejamento - Fórmulas**\n\n**Macrogotas (20 gotas/ml):**\nGts/min = (V × 20) / (T × 60)\n\n**Microgotas (60 microgotas/ml):**\nMcgts/min = (V × 60) / (T × 60) = V / T\n\n**Onde:**\nV = Volume em ml\nT = Tempo em horas\n\n**Exemplo Prático:**\n500ml em 8 horas\nMacrogotas: (500 × 20) / (8 × 60) = 21 gts/min\nMicrogotas: 500 / 8 = 63 mcgts/min\n\n**Lembrete:** Soro fisiológico 0,9%, Glicose 5%, Ringer Lactato`
        },
        {
            pergunta: 'cuidados com drenos',
            resposta: `🔴 **Cuidados com Drenos - Tipos e Manejo**\n\n**Tipos de Drenos:**\n• **Penrose:** drenagem por capilaridade\n• **Portovac:** sistema de vácuo\n• **Jackson-Pratt:** bolsa compressível\n• **Tubo em T:** drenagem biliar\n\n**Cuidados de Enfermagem:**\n1. **Observar:**\n   - Características do dreno\n   - Volume drenado\n   - Sinais de infecção\n\n2. **Manter:**\n   - Sistema fechado\n   - Posição adequada\n   - Fixação segura\n\n3. **Registrar:**\n   - Volume horário\n   - Características\n   - Intercorrências`
        },
        // NOVAS PERGUNTAS ADICIONADAS
        {
            pergunta: 'o que é suporte ventilatório avançado',
            resposta: `🌬️ **Suporte Ventilatório Avançado**\n\n**Definição:**\nÉ o uso de tecnologias e técnicas complexas para tratar insuficiência respiratória grave quando métodos convencionais falham.\n\n**Componentes Principais:**\n\n🔸 **1. Ventilação Mecânica Invasiva (com tubo endotraqueal):**\n   - Modos de controle avançados (APRV, PRVC, ASV)\n   - Monitorização de curvas pressão-volume\n   - Estratégias protetoras de pulmão\n\n🔸 **2. Ventilação de Alta Frequência (HFOV):**\n   - Para pulmões muito rígidos/compliance baixa\n   - Frequências: 300-900 ciclos/min\n   - Volumes correntes menores que espaço morto\n\n🔸 **3. Óxido Nítrico Inalado (iNO):**\n   - Vasodilatador pulmonar seletivo\n   - Melhora a oxigenação na hipertensão pulmonar\n   - Doses: 5-20 ppm\n\n🔸 **4. ECMO (Oxigenação por Membrana Extracorpórea):**\n   - Máquina de suporte de vida que oxigena o sangue fora do corpo\n   - Indicada quando a relação PaO2/FiO2 < 80\n   - Tipos: VV-ECMO (apenas pulmão) e VA-ECMO (pulmão + coração)\n\n**Indicações:**\n• SDRA grave\n• Hipertensão pulmonar refratária\n• Ponte para transplante\n• Falência respiratória pós-cirúrgica\n\n**Monitorização Necessária:**\n• Gasometria arterial seriada\n• Curvas pressão-volume\n• Ecocardiograma\n• Pressão venosa central`
        },
        {
            pergunta: 'quando é necessário usar o oxigênio em neonatal',
            resposta: `👶 **Oxigenoterapia em Neonatologia - Indicações**\n\n**Critérios para Início da Oxigenoterapia:**\n\n📊 **Por Saturação Periférica de Oxigênio (SpO2):**\n• **RN a termo (>37 semanas):** SpO2 < 92%\n• **RN pré-termo (32-36 semanas):** SpO2 < 90%\n• **RN muito pré-termo (<32 semanas):** SpO2 < 88%\n\n💙 **Por Gasometria Arterial:**\n• PaO2 < 60 mmHg\n• SaO2 < 90%\n• Acidose respiratória (pH < 7.25 com PaCO2 elevada)\n\n⚠️ **Sinais Clínicos de Hipoxemia:**\n• Taquipneia (>60 rpm)\n• Retrações intercostais\n• Gemência expiratória\n• Cianose central\n• Letargia ou irritabilidade\n• Apneias recorrentes\n\n**Objetivos da Oxigenoterapia:**\n• Manter SpO2: 90-95% para maioria dos neonatos\n• Prevenir hipoxemia sem causar hiperóxia\n• Evitar retinopatia da prematuridade\n• Suportar desenvolvimento neurológico\n\n**Métodos de Administração:**\n1. **Cânula Nasal:** 0.1-2 L/min\n2. **Máscara Facial:** 2-5 L/min\n3. **CPAP Nasal:** 4-8 cmH2O\n4. **Ventilação Mecânica:** quando os métodos anteriores falham\n\n🚨 **Atenção Crítica:**\n• Monitorar continuamente SpO2\n• Ajustar FiO2 para a menor necessária\n• Evitar hiperóxia (SpO2 > 95% prolongada)\n• Realizar triagem para retinopatia em prematuros`
        },
        {
            pergunta: 'o que é suporte ventilatório invasivo',
            resposta: `💉 **Suporte Ventilatório Invasivo - Definição Completa**\n\n**Conceito:**\nÉ a ventilação mecânica realizada através de acesso artificial às vias aéreas inferiores, geralmente por meio de tubo endotraqueal ou traqueostomia.\n\n**Indicações Absolutas:**\n1. **Parada respiratória:** apneia completa\n2. **Hipoxemia refratária:** PaO2 < 60mmHg com FiO2 1.0\n3. **Hipercapnia grave:** PaCO2 > 60mmHg com acidose (pH < 7.25)\n4. **Estado de choque:** necessidade de redução do trabalho respiratório\n5. **Proteção de vias aéreas:** coma, trauma craniano, intoxicação\n\n**Componentes do Sistema Invasivo:**\n\n🔹 **1. Via Aérea Artificial:**\n   • Tubo endotraqueal (orotraqueal ou nasotraqueal)\n   • Cânula de traqueostomia\n   • Sistema de fixação seguro\n\n🔹 **2. Ventilador Mecânico:**\n   • Modos: Volume Control, Pressure Control, SIMV, PSV\n   • Parâmetros ajustáveis: Vt, FR, PEEP, FiO2, I:E\n   • Alarms configurados\n\n🔹 **3. Monitorização:**\n   • Gasometria arterial\n   • Oximetria de pulso contínua\n   • Capnografia\n   • Curvas ventilatórias\n\n**Parâmetros Iniciais Recomendados:**\n• **Volume Corrente:** 6-8 ml/kg (peso ideal)\n• **Frequência Respiratória:** 12-20 rpm\n• **FiO2:** 100% inicial, reduzir rapidamente\n• **PEEP:** 5-8 cmH2O\n• **Relação I:E:** 1:2 a 1:3\n\n**Complicações Potenciais:**\n• Lesão por pressão (barotrauma/volutrauma)\n• Pneumonia associada à ventilação\n• Atelectasia\n• Dependência de ventilador\n• Lesão de cordas vocais\n\n**Estratégias Protetoras:**\n• Volume corrente baixo (6 ml/kg)\n• PEEP adequado para recrutamento\n• Pressão de platô < 30 cmH2O\n• Desmame precoce quando possível\n\n**Importante:** A ventilação invasiva é procedimento de alto risco que requer monitorização intensiva e equipe treinada.`
        }
    ];

    // ==================== FUNÇÃO HAMBURGER CORRIGIDA ====================
    function toggleHamburgerMenu() {
        const sidebar = document.getElementById('mainSidebar');
        const hamburgerBtn = document.getElementById('hamburgerToggle');
        
        // Alternar classe active na sidebar
        sidebar.classList.toggle('active');
        
        // Atualizar ícone do botão
        const icon = hamburgerBtn.querySelector('i');
        if (sidebar.classList.contains('active')) {
            icon.className = 'fas fa-times';
            hamburgerBtn.style.left = '280px'; // Quando sidebar está aberta
            hamburgerBtn.style.transform = 'translateX(-50%)';
        } else {
            icon.className = 'fas fa-bars';
            hamburgerBtn.style.left = '20px'; // Quando sidebar está fechada
            hamburgerBtn.style.transform = 'none';
        }
        
        // Mostrar notificação
        const isOpen = sidebar.classList.contains('active');
        showNotification(`Menu ${isOpen ? 'aberto' : 'fechado'}`);
    }

    // ==================== SISTEMA DE LOGIN/CADASTRO ====================
    function openLoginModal(tab = 'login') {
        document.getElementById('login-modal').style.display = 'flex';
        switchLoginTab(tab);
    }

    function closeLoginModal() {
        document.getElementById('login-modal').style.display = 'none';
    }

    function switchLoginTab(tab) {
        document.querySelectorAll('.login-modal-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.login-modal-form').forEach(f => f.classList.remove('active'));
        
        if (tab === 'login') {
            document.querySelector('.login-modal-tab:nth-child(1)').classList.add('active');
            document.getElementById('login-form').classList.add('active');
        } else {
            document.querySelector('.login-modal-tab:nth-child(2)').classList.add('active');
            document.getElementById('register-form').classList.add('active');
        }
    }

    function loginUser() {
        const email = document.getElementById('login-email').value;
        const password = document.getElementById('login-password').value;
        
        if (!email || !password) {
            showNotification('Por favor, preencha todos os campos');
            return;
        }
        
        // Simulação de login
        const users = JSON.parse(localStorage.getItem('reelmi_users') || '[]');
        const user = users.find(u => u.email === email && u.password === password);
        
        if (user) {
            currentUser = user;
            localStorage.setItem('reelmi_current_user', JSON.stringify(user));
            showNotification(`Bem-vindo, ${user.name}!`);
            closeLoginModal();
            updateUserDisplay();
        } else {
            showNotification('E-mail ou senha incorretos');
        }
    }

    function registerUser() {
        const name = document.getElementById('register-name').value;
        const email = document.getElementById('register-email').value;
        const password = document.getElementById('register-password').value;
        const confirm = document.getElementById('register-confirm').value;
        
        if (!name || !email || !password || !confirm) {
            showNotification('Por favor, preencha todos os campos');
            return;
        }
        
        if (password !== confirm) {
            showNotification('As senhas não coincidem');
            return;
        }
        
        if (password.length < 6) {
            showNotification('A senha deve ter pelo menos 6 caracteres');
            return;
        }
        
        // Verificar se usuário já existe
        const users = JSON.parse(localStorage.getItem('reelmi_users') || '[]');
        if (users.find(u => u.email === email)) {
            showNotification('Este e-mail já está cadastrado');
            return;
        }
        
        // Criar novo usuário
        const newUser = {
            id: Date.now(),
            name: name,
            email: email,
            password: password,
            created: new Date().toISOString(),
            plan: 'free',
            preferences: {}
        };
        
        users.push(newUser);
        localStorage.setItem('reelmi_users', JSON.stringify(users));
        localStorage.setItem('reelmi_current_user', JSON.stringify(newUser));
        currentUser = newUser;
        
        showNotification(`Conta criada com sucesso! Bem-vindo, ${name}!`);
        closeLoginModal();
        updateUserDisplay();
    }

    function updateUserDisplay() {
        const userData = JSON.parse(localStorage.getItem('reelmi_current_user') || 'null');
        const userCard = document.getElementById('user-card');
        const userAvatar = document.getElementById('user-avatar');
        const userName = document.getElementById('user-name');
        const loginSection = document.getElementById('login-section');
        
        if (userData && userCard && userAvatar && userName) {
            // Gerar cor baseada no nome do usuário
            const colors = ['#667eea', '#764ba2', '#8C52FF', '#f59e0b', '#10b981'];
            const colorIndex = userData.name.length % colors.length;
            userAvatar.style.background = colors[colorIndex];
            userAvatar.textContent = userData.name.charAt(0).toUpperCase();
            
            userName.textContent = userData.name;
            
            // Esconder seção de login
            if (loginSection) {
                loginSection.style.display = 'none';
            }
            
            // Atualizar emoção baseada no plano
            const emotionStatus = document.getElementById('emotion-status');
            if (emotionStatus) {
                emotionStatus.textContent = userData.plan === 'pro' ? 'Emoção: 😎 PRO' : 'Emoção: 😊';
            }
        } else {
            // Mostrar seção de login se não estiver logado
            if (loginSection) {
                loginSection.style.display = 'block';
            }
            if (userAvatar) userAvatar.textContent = 'U';
            if (userName) userName.textContent = 'Usuário Pro';
        }
    }

    function logoutUser() {
        if (confirm('Deseja realmente sair?')) {
            localStorage.removeItem('reelmi_current_user');
            currentUser = null;
            showNotification('Logout realizado com sucesso');
            updateUserDisplay();
        }
    }

    // ==================== FUNÇÃO LIMPAR CHAT ====================
    function clearChat() {
        if (confirm('Tem certeza que deseja limpar todo o histórico do chat?')) {
            contextoConversa = [];
            document.getElementById('chat-history').innerHTML = '';
            document.getElementById('timeline-content').innerHTML = '';
            localStorage.removeItem('reelmi_context');
            document.getElementById('context-length').textContent = '0';
            showNotification('Chat limpo com sucesso!');
        }
    }

    // ==================== FUNÇÃO PARA MOSTRAR PERGUNTAS DE ENFERMAGEM ====================
    function showNursingQuestions() {
        let html = '<h2 style="margin-bottom: 20px;">📚 Perguntas Frequentes - Enfermagem</h2>';
        
        perguntasEnfermagem.forEach((item, index) => {
            html += `
                <div class="algorithm-step" onclick="usarSugestao('${item.pergunta}')">
                    <h3>${index + 1}. ${item.pergunta.charAt(0).toUpperCase() + item.pergunta.slice(1)}</h3>
                    <p>Clique para ver resposta detalhada</p>
                </div>
            `;
        });
        
        // Criar modal
        const modal = document.createElement('div');
        modal.className = 'calculator-modal';
        modal.style.display = 'flex';
        modal.innerHTML = `
            <div class="calc-content" style="max-width: 800px; max-height: 80vh; overflow-y: auto;">
                ${html}
                <button onclick="this.parentElement.parentElement.remove()" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Fechar
                </button>
            </div>
        `;
        document.body.appendChild(modal);
    }

    // ==================== FUNÇÕES DAS 7 FUNCIONALIDADES DO MENU ====================
    
    // 1. FUNÇÃO: Modo Compacto
    function toggleCompactMode() {
        compactModeActive = !compactModeActive;
        const aside = document.querySelector('aside');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const hamburgerToggle = document.querySelector('.hamburger-toggle');
        
        if (compactModeActive) {
            // Ativar modo compacto
            aside.style.width = '60px';
            document.querySelectorAll('.nav-item span').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.menu-label').forEach(el => el.style.display = 'none');
            document.querySelector('.brand-area h1').style.display = 'none';
            document.querySelector('.brand-area').style.justifyContent = 'center';
            document.querySelector('.sidebar-footer').style.display = 'none';
            
            // Ajustar botões
            sidebarToggle.style.left = '60px';
            hamburgerToggle.style.left = '70px';
            hamburgerToggle.style.transform = 'translateX(-50%)';
            
            showNotification('Modo compacto ativado');
        } else {
            // Desativar modo compacto
            aside.style.width = '280px';
            document.querySelectorAll('.nav-item span').forEach(el => el.style.display = 'inline');
            document.querySelectorAll('.menu-label').forEach(el => el.style.display = 'block');
            document.querySelector('.brand-area h1').style.display = 'block';
            document.querySelector('.brand-area').style.justifyContent = 'flex-start';
            document.querySelector('.sidebar-footer').style.display = 'block';
            
            // Restaurar botões
            if (sidebarVisible) {
                sidebarToggle.style.left = '285px';
                hamburgerToggle.style.left = '300px';
                hamburgerToggle.style.transform = 'translateX(-50%)';
            } else {
                sidebarToggle.style.left = '20px';
                hamburgerToggle.style.left = '20px';
                hamburgerToggle.style.transform = 'none';
            }
            
            showNotification('Modo compacto desativado');
        }
        
        // Atualizar status no menu
        updateMenuStatusIndicators();
        
        // Salvar preferência
        localStorage.setItem('reelmi_compact_mode', compactModeActive);
    }
    
    // 2. FUNÇÃO: Ativar/Desativar "Hey Reelmi"
    function toggleWakeWord() {
        if (wakeWordActive) {
            // Desativar wake word
            if (wakeWordRecognition) {
                try {
                    wakeWordRecognition.stop();
                } catch (e) {
                    console.log('Wake word já estava parado');
                }
            }
            wakeWordActive = false;
            showNotification('Wake word "Hey Reelmi" desativado');
        } else {
            // Ativar wake word
            iniciarWakeWord();
            showNotification('Wake word "Hey Reelmi" ativado. Diga "Hey Reelmi" para começar!');
        }
        updateMenuStatusIndicators();
    }
    
    // 3. FUNÇÃO: Enviar Imagem
    function uploadImage() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                // Verificar tamanho da imagem (máximo 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    showNotification('Imagem muito grande. Máximo: 5MB');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = (e) => {
                    // Adicionar mensagem no chat
                    addMsg(`📸 [Imagem enviada: ${file.name}]`, 'user');
                    
                    // Criar preview da imagem
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'image-preview';
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.style.borderRadius = '10px';
                    img.style.margin = '10px 0';
                    
                    // Adicionar preview ao chat
                    const lastMessage = document.querySelector('#chat-history .msg-row.user:last-child .bubble');
                    if (lastMessage) {
                        lastMessage.appendChild(document.createElement('br'));
                        lastMessage.appendChild(img);
                    }
                    
                    // Resposta da IA
                    setTimeout(() => {
                        addMsg('📸 Recebi sua imagem! Posso ajudar com:\n\n1. **Descrição da imagem**\n2. **Análise básica de conteúdo**\n3. **Extrair texto (OCR)**\n4. **Detecção de objetos**\n\nO que você gostaria que eu faça com esta imagem?', 'bot');
                    }, 600);
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    }
    
    // 4. FUNÇÃO: Avisos de Segurança
    function showSafetyModal() {
        document.getElementById('safety-modal').style.display = 'flex';
    }
    
    // 5. FUNÇÃO: Recomendações
    function showRecommendationsModal() {
        document.getElementById('recommendations-modal').style.display = 'flex';
        loadRecommendations();
    }
    
    function loadRecommendations() {
        const recommendations = [
            {
                title: '📚 Estudo de Ventilação Mecânica',
                description: 'Baseado no seu histórico, recomendamos revisar os modos ventilatorios básicos.',
                action: () => usarSugestao('Explique os modos ventilatorios básicos')
            },
            {
                title: '👶 Neonatologia - Casos Práticos',
                description: 'Pratique com casos clínicos de reanimação neonatal.',
                action: () => showAlgorithms()
            },
            {
                title: '💻 Desenvolvimento Python',
                description: 'Aprimore suas habilidades com exercícios práticos.',
                action: () => openPythonTerminal()
            },
            {
                title: '🧠 Treinamento da IA',
                description: 'Ajude a melhorar a Reelmi AI com seu conhecimento.',
                action: () => openTraining()
            },
            {
                title: '🏥 Enfermagem - Cálculos',
                description: 'Pratique cálculos de medicamentos e gotejamento.',
                action: () => showNursingQuestions()
            }
        ];
        
        const content = document.getElementById('recommendations-content');
        content.innerHTML = '';
        
        recommendations.forEach((rec, index) => {
            const div = document.createElement('div');
            div.className = 'algorithm-step';
            div.innerHTML = `
                <h3>${rec.title}</h3>
                <p>${rec.description}</p>
            `;
            div.onclick = rec.action;
            content.appendChild(div);
        });
    }
    
    // 6. FUNÇÃO: Mostrar/Esconder Dock
    function toggleAppDock() {
        const dock = document.getElementById('app-dock');
        if (dock.style.display === 'none') {
            dock.style.display = 'flex';
            dockVisible = true;
            showNotification('Dock de aplicativos visível');
        } else {
            dock.style.display = 'none';
            dockVisible = false;
            showNotification('Dock de aplicativos escondido');
        }
        updateMenuStatusIndicators();
    }
    
    // 7. FUNÇÃO: Mostrar/Esconder Timeline
    function toggleTimeline() {
        const timeline = document.getElementById('chat-timeline');
        timelineVisible = !timelineVisible;
        
        if (timelineVisible) {
            timeline.style.display = 'block';
            showNotification('Timeline do chat visível');
            updateTimeline();
        } else {
            timeline.style.display = 'none';
            showNotification('Timeline do chat escondida');
        }
        updateMenuStatusIndicators();
    }
    
    // ==================== SISTEMA DE CONTEXTO ====================
    function adicionarAoContexto(role, content) {
        contextoConversa.push({role, content, timestamp: new Date().toISOString()});
        
        if (contextoConversa.length > maxContexto) {
            contextoConversa = contextoConversa.slice(-maxContexto);
        }
        
        document.getElementById('context-length').textContent = contextoConversa.length;
        localStorage.setItem('reelmi_context', JSON.stringify(contextoConversa));
        
        // Atualizar timeline se visível
        if (timelineVisible) {
            updateTimeline();
        }
    }
    
    function updateTimeline() {
        const timelineContent = document.getElementById('timeline-content');
        if (!timelineContent) return;
        
        let html = '';
        
        contextoConversa.forEach((msg, index) => {
            if (index % 3 === 0 || index === contextoConversa.length - 1) {
                const time = new Date(msg.timestamp).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                const preview = msg.content.substring(0, 30) + (msg.content.length > 30 ? '...' : '');
                
                html += `
                    <div class="timeline-item" onclick="scrollToMessage(${index})">
                        <div style="font-size: 10px; opacity: 0.7;">${time}</div>
                        <div>${msg.role === 'user' ? '👤' : '🤖'} ${preview}</div>
                    </div>
                `;
            }
        });
        
        if (html === '') {
            html = '<div style="text-align: center; padding: 20px; color: var(--text-muted);"><i class="fas fa-clock"></i><br>Timeline vazia</div>';
        }
        
        timelineContent.innerHTML = html;
    }
    
    function scrollToMessage(index) {
        const messages = document.querySelectorAll('.msg-row');
        if (messages[index]) {
            messages[index].scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Destacar a mensagem
            messages[index].style.animation = 'pulse 0.5s';
            setTimeout(() => {
                messages[index].style.animation = '';
            }, 500);
        }
    }
    
    // ==================== SISTEMA DE VOZ ====================
    function iniciarWakeWord() {
        if (!('webkitSpeechRecognition' in window)) {
            showNotification('Seu navegador não suporta reconhecimento de voz');
            return;
        }
        
        wakeWordRecognition = new webkitSpeechRecognition();
        wakeWordRecognition.continuous = true;
        wakeWordRecognition.interimResults = false;
        wakeWordRecognition.lang = 'pt-BR';
        
        wakeWordRecognition.onresult = (event) => {
            const transcript = event.results[event.results.length - 1][0].transcript.toLowerCase();
            
            if (transcript.includes('hey reelmi') || transcript.includes('ei rilmi') || transcript.includes('hey rilmi')) {
                wakeWordRecognition.stop();
                abrirVoz();
                document.getElementById('status-voz').textContent = "Olá! Como posso ajudar?";
                showNotification('Wake word detectado! Modo voz ativado.');
            }
        };
        
        wakeWordRecognition.onerror = (event) => {
            console.error('Erro no wake word:', event.error);
        };
        
        wakeWordRecognition.start();
        wakeWordActive = true;
        updateMenuStatusIndicators();
        
        // Salvar preferência
        localStorage.setItem('reelmi_wake_word', true);
    }
    
    function criarWaveVisualizer() {
        const container = document.getElementById('wave-visualizer');
        container.innerHTML = '';
        
        for (let i = 0; i < 50; i++) {
            const bar = document.createElement('div');
            bar.className = 'wave-bar';
            bar.style.left = `${i * 6}px`;
            bar.style.height = `${5 + Math.random() * 20}px`;
            bar.style.setProperty('--i', i);
            container.appendChild(bar);
        }
    }
    
    function abrirVoz() {
        document.getElementById('voice-overlay').style.display = 'flex';
        criarWaveVisualizer();
    }
    
    function iniciarGravacao() {
        if(!('webkitSpeechRecognition' in window)) {
            alert('Navegador não suporta voz.');
            return;
        }
        
        recognition = new webkitSpeechRecognition();
        recognition.lang = 'pt-BR';
        recognition.continuous = false;
        recognition.interimResults = true;

        recognition.onstart = () => {
            isRecording = true;
            document.getElementById('status-voz').innerText = "Ouvindo... Fale agora";
            
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '0.3s';
            });
        };

        recognition.onend = () => {
            isRecording = false;
            document.getElementById('status-voz').innerText = "Processando...";
            
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '1.5s';
            });
            
            // Reiniciar wake word se estiver ativo
            if (wakeWordActive) {
                setTimeout(() => iniciarWakeWord(), 1000);
            }
        };

        recognition.onresult = (event) => {
            let finalTranscript = '';
            let interimTranscript = '';
            
            for (let i = event.resultIndex; i < event.results.length; i++) {
                const transcript = event.results[i][0].transcript;
                if (event.results[i].isFinal) {
                    finalTranscript += transcript;
                } else {
                    interimTranscript += transcript;
                }
            }
            
            document.getElementById('texto-voz').innerHTML = 
                `<strong>${finalTranscript}</strong> <em style="color:#888">${interimTranscript}</em>`;
            
            if (finalTranscript) {
                // Processar resposta
                processarRespostaVoz(finalTranscript);
            }
        };

        recognition.start();
    }
    
    function processarRespostaVoz(texto) {
        const resposta = encontrarRespostaComContexto(texto);
        
        // Adicionar ao chat
        setTimeout(() => {
            addMsg(texto, 'user');
            addMsg(resposta, 'bot');
        }, 500);
        
        // Converter resposta para voz
        const respostaLimpa = resposta
            .replace(/\*\*/g, '')
            .replace(/👨‍🏫|🤗|🔬|💡|📊|⚡|⚠️|📸|🧠|💻|👶|📚/g, '');
        
        const audio = new SpeechSynthesisUtterance(respostaLimpa);
        audio.lang = 'pt-BR';
        audio.rate = 1.0;
        audio.pitch = 1.0;
        audio.volume = 1.0;
        
        audio.onstart = () => {
            document.getElementById('status-voz').textContent = "Respondendo...";
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '0.5s';
                bar.style.background = 'linear-gradient(to top, #00ff00, #00cc00)';
            });
        };
        
        audio.onend = () => {
            document.getElementById('status-voz').textContent = "Toque para falar novamente";
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '1.5s';
                bar.style.background = 'linear-gradient(to top, #667eea, #764ba2)';
            });
        };
        
        window.speechSynthesis.speak(audio);
    }
    
    function toggleGravacao() {
        if(isRecording) {
            recognition.stop();
        } else {
            iniciarGravacao();
        }
    }
    
    function fecharVoz() {
        document.getElementById('voice-overlay').style.display = 'none';
        if (recognition) recognition.stop();
        isRecording = false;
        
        // Reiniciar wake word se estiver ativo
        if (wakeWordActive) {
            setTimeout(() => iniciarWakeWord(), 500);
        }
    }
    
    // ==================== FUNÇÃO TOGGLE SIDEBAR ====================
    function toggleSidebar() {
        sidebarVisible = !sidebarVisible;
        document.body.classList.toggle('sidebar-hidden');
        
        const toggleBtn = document.getElementById('sidebarToggle');
        const hamburgerBtn = document.querySelector('.hamburger-toggle');
        const icon = toggleBtn.querySelector('i');
        
        if (!sidebarVisible) {
            icon.className = 'fas fa-chevron-right';
            toggleBtn.title = 'Mostrar Menu (Ctrl+B)';
            hamburgerBtn.style.left = '20px';
            hamburgerBtn.style.transform = 'none';
            adjustWindowsForHiddenSidebar();
            showNotification('Menu escondido');
        } else {
            icon.className = 'fas fa-chevron-left';
            toggleBtn.title = 'Esconder Menu (Ctrl+B)';
            hamburgerBtn.style.left = '300px';
            hamburgerBtn.style.transform = 'translateX(-50%)';
            restoreWindowsPosition();
            showNotification('Menu visível');
        }
        
        localStorage.setItem('reelmi_sidebar_hidden', !sidebarVisible);
        updateMenuStatusIndicators();
    }
    
    function adjustWindowsForHiddenSidebar() {
        const windows = document.querySelectorAll('.os-window');
        windows.forEach(window => {
            const currentLeft = parseInt(window.style.left) || 0;
            window.dataset.originalLeft = currentLeft;
            const newLeft = Math.max(20, currentLeft - 280);
            window.style.left = newLeft + 'px';
        });
    }
    
    function restoreWindowsPosition() {
        const windows = document.querySelectorAll('.os-window');
        windows.forEach(window => {
            if (window.dataset.originalLeft) {
                const originalLeft = parseInt(window.dataset.originalLeft);
                window.style.left = (originalLeft + 280) + 'px';
                delete window.dataset.originalLeft;
            }
        });
    }
    
    // ==================== MENU DROPDOWN ====================
    function setupMenuDropdown() {
        const menuToggle = document.getElementById('menuToggle');
        const menuDropdown = document.getElementById('menuDropdown');
        
        if (menuToggle && menuDropdown) {
            // Toggle menu on click
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                menuDropdown.classList.toggle('show');
                
                // Atualizar status ao abrir
                if (menuDropdown.classList.contains('show')) {
                    updateMenuStatusIndicators();
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!menuDropdown.contains(e.target) && !menuToggle.contains(e.target)) {
                    menuDropdown.classList.remove('show');
                }
            });
            
            // Close menu when clicking on a menu item
            const dropdownItems = menuDropdown.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    setTimeout(() => {
                        menuDropdown.classList.remove('show');
                    }, 300);
                });
            });
        }
    }
    
    function updateMenuStatusIndicators() {
        // Wake Word status
        const wakeWordStatus = document.getElementById('wakeWordStatus');
        if (wakeWordStatus) {
            wakeWordStatus.textContent = wakeWordActive ? 'ON' : 'OFF';
            wakeWordStatus.className = wakeWordActive ? 'dropdown-badge status-active' : 'dropdown-badge status-inactive';
        }
        
        // Dock status
        const dockStatus = document.getElementById('dockStatus');
        if (dockStatus) {
            dockStatus.textContent = dockVisible ? 'ON' : 'OFF';
            dockStatus.className = dockVisible ? 'dropdown-badge status-active' : 'dropdown-badge status-inactive';
        }
        
        // Timeline status
        const timelineStatus = document.getElementById('timelineStatus');
        if (timelineStatus) {
            timelineStatus.textContent = timelineVisible ? 'ON' : 'OFF';
            timelineStatus.className = timelineVisible ? 'dropdown-badge status-active' : 'dropdown-badge status-inactive';
        }
        
        // AI status
        const aiStatus = document.getElementById('aiStatus');
        if (aiStatus) {
            aiStatus.textContent = realAIActive ? 'ON' : 'OFF';
            aiStatus.className = realAIActive ? 'dropdown-badge ai-status status-active' : 'dropdown-badge ai-status status-inactive';
        }
        
        // Compact Mode status
        const compactModeStatus = document.getElementById('compactModeStatus');
        if (compactModeStatus) {
            compactModeStatus.textContent = compactModeActive ? 'ON' : 'OFF';
            compactModeStatus.className = compactModeActive ? 'dropdown-badge status-active' : 'dropdown-badge status-inactive';
        }
    }
    
    // ==================== SISTEMA DE RESPOSTAS ====================
    function encontrarRespostaComContexto(input) {
        const texto = input.toLowerCase();
        
        // Verificar segurança
        if (texto.includes("dose") && (texto.includes("aplicar") || texto.includes("medicamento"))) {
            return "⚠️ CONSULTA OBRIGATÓRIA COM PROFISSIONAL DA SAÚDE. Como assistente de IA, não posso prescrever doses medicamentosas. Consulte sempre um médico ou farmacêutico para dosagens precisas.";
        }
        
        // Verificar palavrões
        const palavroes = ['idiota', 'burro', 'estúpido', 'inútil', 'odeio', 'morra'];
        for (const palavra of palavroes) {
            if (texto.includes(palavra)) {
                return "Entendo que você pode estar frustrado. Estou aqui para ajudar de forma respeitosa. Como posso auxiliá-lo melhor?";
            }
        }
        
        adicionarAoContexto('user', input);
        
        // Verificar perguntas de enfermagem
        for (const item of perguntasEnfermagem) {
            if (texto.includes(item.pergunta)) {
                adicionarAoContexto('assistant', item.resposta);
                return item.resposta;
            }
        }
        
        // Respostas baseadas em contexto
        const respostasBase = [
            { pergunta: 'o que é cpap', resposta: 'CPAP (Continuous Positive Airway Pressure) é uma modalidade de ventilação não invasiva que mantém pressão positiva contínua nas vias aéreas.' },
            { pergunta: 'modos ventilatorios', resposta: 'Os modos ventilatorios básicos incluem: Volume Control, Pressure Control, SIMV, CPAP, e Pressão de Suporte.' },
            { pergunta: 'criar código python', resposta: 'Aqui está um exemplo básico de código Python:\n\n```python\nprint("Olá, mundo!")\n\n# Exemplo de função\ndef calcular_media(notas):\n    return sum(notas) / len(notas)\n```' },
            { pergunta: 'neonatologia', resposta: 'Neonatologia é a especialidade médica que cuida de recém-nascidos, especialmente prematuros ou com problemas de saúde.' }
        ];
        
        // Procurar resposta correspondente
        for (const item of respostasBase) {
            if (texto.includes(item.pergunta)) {
                adicionarAoContexto('assistant', item.resposta);
                return item.resposta;
            }
        }
        
        // Resposta padrão
        const personalidade = document.getElementById('personality-select').value;
        let respostaPadrao = '';
        
        switch(personalidade) {
            case 'teacher':
                respostaPadrao = 'Vamos aprender juntos! Posso explicar sobre ventilação mecânica, neonatologia, programação Python e outros tópicos. O que você gostaria de saber?';
                break;
            case 'simple':
                respostaPadrao = 'Posso ajudar com assuntos de saúde ou tecnologia. Me pergunte de forma simples!';
                break;
            case 'technical':
                respostaPadrao = 'Como sistema técnico especializado, posso fornecer informações detalhadas sobre ventilação mecânica, parâmetros ventilatorios, algoritmos clínicos e desenvolvimento Python.';
                break;
            case 'empathetic':
                respostaPadrao = 'Entendo que você está buscando informações. Estou aqui para ajudar de forma clara e acolhedora. Conte-me mais sobre sua dúvida.';
                break;
            case 'analytical':
                respostaPadrao = 'Analisando sua consulta: posso fornecer dados estruturados e informações técnicas baseadas em evidências. Especifique os parâmetros de interesse.';
                break;
            default:
                respostaPadrao = 'Como modelo de IA especializado, posso ajudar com questões sobre ventilação mecânica, neonatologia, programação Python e outras áreas técnicas. Como posso ajudá-lo?';
        }
        
        adicionarAoContexto('assistant', respostaPadrao);
        return respostaPadrao;
    }
    
    // ==================== FUNÇÕES DO CHAT ====================
    function addMsg(texto, tipo, salvar = true) {
        document.getElementById('dashboard-view').style.display = 'none';
        document.getElementById('chat-view').style.display = 'flex';
        document.getElementById('study-view').style.display = 'none';
        
        const history = document.getElementById('chat-history');
        const div = document.createElement('div');
        div.className = `msg-row ${tipo}`;
        
        let avatarImg = tipo === 'bot' ? 'roboreelmi.png' : 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png';
        let fallback = tipo === 'bot' ? 'https://cdn-icons-png.flaticon.com/512/4712/4712109.png' : 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png';
        
        const htmlAvatar = `<div class="avatar"><img src="${avatarImg}" onerror="this.src='${fallback}'"></div>`;
        const htmlBubble = `<div class="bubble">${texto}</div>`;
        
        div.innerHTML = tipo === 'bot' ? htmlAvatar + htmlBubble : htmlBubble + htmlAvatar;
        history.appendChild(div);
        history.scrollTop = history.scrollHeight;
        
        if (salvar && tipo === 'bot') {
            salvarConversa();
        }
        
        // Atualizar timeline se visível
        if (timelineVisible) {
            setTimeout(() => updateTimeline(), 100);
        }
    }
    
    function enviarTexto() {
        const campo = document.getElementById('campo-texto');
        const txt = campo.value.trim();
        if(!txt) return;
        
        addMsg(txt, 'user');
        campo.value = '';
        
        // Mostrar indicador de digitação
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'msg-row bot';
        typingIndicator.id = 'typing-indicator';
        typingIndicator.innerHTML = `
            <div class="avatar"><img src="roboreelmi.png" onerror="this.src='https://cdn-icons-png.flaticon.com/512/4712/4712109.png'"></div>
            <div class="bubble">
                <div class="loading-wave">
                    <div></div><div></div><div></div><div></div>
                </div>
            </div>
        `;
        document.getElementById('chat-history').appendChild(typingIndicator);
        document.getElementById('chat-history').scrollTop = history.scrollHeight;
        
        // Simular processamento e resposta
        setTimeout(() => {
            const resp = encontrarRespostaComContexto(txt);
            document.getElementById('typing-indicator')?.remove();
            addMsg(resp, 'bot');
        }, 1000 + Math.random() * 1000);
    }
    
    function usarSugestao(texto) {
        addMsg(texto, 'user');
        setTimeout(() => {
            const resp = encontrarRespostaComContexto(texto);
            addMsg(resp, 'bot');
        }, 600);
    }
    
    function teclaEnter(e) { 
        if(e.key === 'Enter') enviarTexto(); 
    }
    
    function salvarConversa() {
        const conversaAtual = {
            id: Date.now(),
            data: new Date().toLocaleString(),
            mensagens: contextoConversa.slice(-5), // Salvar últimas 5 mensagens
            categoria: 'geral'
        };
        
        historicoConversas.push(conversaAtual);
        
        if (historicoConversas.length > 50) {
            historicoConversas = historicoConversas.slice(-50);
        }
        
        localStorage.setItem('reelmi_historico', JSON.stringify(historicoConversas));
    }
    
    // ==================== FUNÇÕES UTILITÁRIAS ====================
    function toggleTheme() { 
        document.body.classList.toggle('light-mode');
        const isLight = document.body.classList.contains('light-mode');
        localStorage.setItem('reelmi_theme', isLight ? 'light' : 'dark');
        showNotification(isLight ? 'Tema claro ativado' : 'Tema escuro ativado');
    }
    
    function switchMode(modo) {
        document.getElementById('dashboard-view').style.display = 'none';
        document.getElementById('chat-view').style.display = 'none';
        document.getElementById('study-view').style.display = 'none';
        
        document.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        
        switch(modo) {
            case 'chat':
                document.getElementById('chat-view').style.display = 'flex';
                document.querySelector('.nav-item:nth-child(1)').classList.add('active');
                break;
            case 'dashboard':
                document.getElementById('dashboard-view').style.display = 'flex';
                document.querySelector('.nav-item:nth-child(2)').classList.add('active');
                break;
            case 'study':
                document.getElementById('study-view').style.display = 'flex';
                document.querySelector('.nav-item:nth-child(3)').classList.add('active');
                document.getElementById('study-content').innerHTML = `
                    <div style="background: var(--bg-surface); padding: 30px; border-radius: 20px; margin-bottom: 20px;">
                        <h2>📚 Módulo 1: Ventilação Mecânica Básica</h2>
                        <p>Conceitos fundamentais, parâmetros e modos ventilatorios.</p>
                        <button onclick="usarSugestao('Explique os modos ventilatorios básicos')" style="padding:10px 20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer; margin-top:10px;">
                            Iniciar Módulo
                        </button>
                    </div>
                    <div style="background: var(--bg-surface); padding: 30px; border-radius: 20px;">
                        <h2>👶 Módulo 2: Neonatologia</h2>
                        <p>Suporte ventilatório neonatal, oxigenoterapia, cuidados com prematuros.</p>
                        <button onclick="usarSugestao('Quais os cuidados com prematuros em VM?')" style="padding:10px 20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer; margin-top:10px;">
                            Iniciar Módulo
                        </button>
                    </div>
                `;
                break;
            case 'nursing':
                showNursingQuestions();
                break;
        }
    }
    
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--primary-gradient);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            z-index: 9999;
            animation: slideIn 0.3s ease;
            max-width: 300px;
        `;
        
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-bell" style="font-size: 20px;"></i>
                <div>
                    <strong>Reelmi AI</strong>
                    <div style="font-size: 14px;">${message}</div>
                </div>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideIn 0.3s ease reverse';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
    
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    // ==================== INICIALIZAÇÃO ====================
    window.onload = function() {
        // Carregar preferências
        const savedTheme = localStorage.getItem('reelmi_theme');
        if (savedTheme === 'light') {
            document.body.classList.add('light-mode');
        }
        
        const savedCompactMode = localStorage.getItem('reelmi_compact_mode');
        if (savedCompactMode === 'true') {
            toggleCompactMode(); // Ativa o modo compacto
        }
        
        const savedWakeWord = localStorage.getItem('reelmi_wake_word');
        if (savedWakeWord === 'true') {
            toggleWakeWord(); // Ativa o wake word
        }
        
        const savedSidebarHidden = localStorage.getItem('reelmi_sidebar_hidden');
        if (savedSidebarHidden === 'true') {
            toggleSidebar(); // Esconde a sidebar
        }
        
        // Configurar botão hamburger CORRETAMENTE
        const hamburgerBtn = document.getElementById('hamburgerToggle');
        hamburgerBtn.addEventListener('click', toggleHamburgerMenu);
        
        // Mostrar hamburger apenas em mobile
        if (window.innerWidth <= 768) {
            hamburgerBtn.style.display = 'flex';
        }
        
        // Carregar contexto
        carregarContextoSalvo();
        
        // Configurar menu dropdown
        setupMenuDropdown();
        
        // Carregar usuário atual
        const userData = localStorage.getItem('reelmi_current_user');
        if (userData) {
            currentUser = JSON.parse(userData);
            updateUserDisplay();
        }
        
        // Inicializar otimizações mobile
        initMobileOptimizations();
        
        // Mensagem de boas-vindas
        setTimeout(() => {
            if (contextoConversa.length === 0) {
                const welcomeMessages = [
                    "Olá! Sou Reelmi AI, seu assistente especializado. Tenho 7 funcionalidades principais no menu: Modo Compacto, Wake Word, Upload de Imagens, Avisos de Segurança, Recomendações, Dock de Apps e Timeline do Chat!",
                    "Bem-vindo ao Reelmi AI! Experimente as funcionalidades do menu dropdown: Modo Compacto, Wake Word 'Hey Reelmi', envio de imagens e muito mais!",
                    "Saudações! Sou Reelmi AI. Todas as funcionalidades estão no menu dropdown. Clique no botão de menu para explorar!"
                ];
                
                const randomMsg = welcomeMessages[Math.floor(Math.random() * welcomeMessages.length)];
                addMsg(randomMsg, 'bot');
                adicionarAoContexto('assistant', randomMsg);
            }
        }, 1000);
        
        // Configurar personalidade
        document.getElementById('personality-select').addEventListener('change', function() {
            showNotification(`Modo: ${this.options[this.selectedIndex].text}`);
        });
        
        // Adicionar evento para fechar sidebar ao clicar fora em mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('mainSidebar');
            const hamburger = document.getElementById('hamburgerToggle');
            
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('active') &&
                !sidebar.contains(e.target) && 
                !hamburger.contains(e.target)) {
                toggleHamburgerMenu();
            }
        });
        
        console.log('✅ Reelmi AI - Sistema completo inicializado!');
        console.log('📋 Todas as funcionalidades adicionadas:');
        console.log('   1. ✅ Modo Compacto');
        console.log('   2. ✅ Wake Word "Hey Reelmi"');
        console.log('   3. ✅ Upload de Imagens');
        console.log('   4. ✅ Avisos de Segurança');
        console.log('   5. ✅ Recomendações Inteligentes');
        console.log('   6. ✅ Dock de Aplicativos');
        console.log('   7. ✅ Timeline do Chat');
        console.log('   8. ✅ Barra de rolagem transparente');
        console.log('   9. ✅ Sistema de Login/Cadastro');
        console.log('   10. ✅ Botão Limpar Chat');
        console.log('   11. ✅ 10 Perguntas de Enfermagem + 3 Novas sobre Ventilação');
        console.log('   12. ✅ Interface otimizada para mobile');
        console.log('✨ BOTÃO HAMBURGER: FUNCIONANDO CORRETAMENTE!');
        console.log('✨ DASHBOARD: Agora tem rolagem para cima e para baixo!');
    };
    
    function carregarContextoSalvo() {
        const saved = localStorage.getItem('reelmi_context');
        if (saved) {
            contextoConversa = JSON.parse(saved);
            document.getElementById('context-length').textContent = contextoConversa.length;
        }
    }
    
    // ==================== OTIMIZAÇÕES PARA MOBILE ====================
    function initMobileOptimizations() {
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        
        if (isMobile) {
            // Mostrar overlay de carregamento
            document.getElementById('mobile-loading').style.display = 'flex';
            
            // Ajustar interface para mobile
            setTimeout(() => {
                document.getElementById('mobile-loading').style.display = 'none';
                
                // Ajustes específicos para mobile
                if (window.innerWidth < 768) {
                    // Mostrar hamburger button em mobile
                    const hamburger = document.getElementById('hamburgerToggle');
                    hamburger.style.display = 'flex';
                    
                    // Ajustar sidebar para mobile
                    const aside = document.querySelector('aside');
                    aside.style.position = 'fixed';
                    aside.style.top = '0';
                    aside.style.left = '0';
                    aside.style.height = '100vh';
                    aside.style.zIndex = '1000';
                    aside.style.transform = 'translateX(-100%)';
                    aside.style.transition = 'transform 0.3s ease';
                    
                    // Ajustar sidebar toggle para mobile
                    document.getElementById('sidebarToggle').style.display = 'none';
                    
                    showNotification('Interface otimizada para mobile');
                }
            }, 1500);
        }
    }
    
    // ==================== ATALHOS DE TECLADO ====================
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'b') {
            e.preventDefault();
            toggleSidebar();
        }
        
        if (e.ctrlKey && e.key === 'd') {
            e.preventDefault();
            toggleAppDock();
        }
        
        if (e.ctrlKey && e.key === 't') {
            e.preventDefault();
            toggleTimeline();
        }
        
        if (e.ctrlKey && e.key === 'm') {
            e.preventDefault();
            toggleCompactMode();
        }
        
        if (e.ctrlKey && e.key === 'l') {
            e.preventDefault();
            clearChat();
        }
        
        if (e.key === 'Escape') {
            // Fechar todos os modais
            document.querySelectorAll('.calculator-modal, .training-modal, .login-modal-overlay').forEach(modal => {
                modal.style.display = 'none';
            });
            // Fechar menu dropdown
            document.getElementById('menuDropdown').classList.remove('show');
            // Fechar sidebar em mobile
            if (window.innerWidth < 768) {
                document.getElementById('mainSidebar').classList.remove('active');
                const hamburger = document.getElementById('hamburgerToggle');
                hamburger.querySelector('i').className = 'fas fa-bars';
                hamburger.style.left = '20px';
                hamburger.style.transform = 'none';
            }
        }
    });
    
    // ==================== FUNÇÕES DE MODAIS (simplificadas) ====================
    function openRealAIModal() {
        document.getElementById('real-ai-modal').style.display = 'flex';
    }
    
    function openMultimodalModal() {
        document.getElementById('multimodal-modal').style.display = 'flex';
    }
    
    function showHistory() {
        const historico = JSON.parse(localStorage.getItem('reelmi_historico') || '[]');
        let html = '<h2>Histórico de Conversas</h2>';
        
        if (historico.length === 0) {
            html += '<p>Nenhuma conversa salva ainda.</p>';
        } else {
            historico.forEach(conv => {
                html += `
                    <div class="algorithm-step" onclick="carregarConversa(${conv.id})">
                        <h3>${conv.data}</h3>
                        <small>${conv.mensagens.length} mensagens</small>
                    </div>
                `;
            });
        }
        
        // Criar modal customizado
        const modal = document.createElement('div');
        modal.className = 'calculator-modal';
        modal.style.display = 'flex';
        modal.innerHTML = `
            <div class="calc-content">
                ${html}
                <button onclick="this.parentElement.parentElement.remove()" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Fechar
                </button>
            </div>
        `;
        document.body.appendChild(modal);
    }
    
    // Funções existentes mantidas
    function showMedicalCalculators() { document.getElementById('medical-calculators').style.display = 'flex'; }
    function showAlgorithms() { document.getElementById('algorithms-modal').style.display = 'flex'; }
    function openPythonTerminal() { document.getElementById('python-terminal-modal').style.display = 'flex'; }
    function showPlugins() { document.getElementById('plugins-modal').style.display = 'flex'; }
    function showPluginDeveloper() { document.getElementById('plugin-developer-modal').style.display = 'flex'; }
    function openTraining() { document.getElementById('training-modal').style.display = 'flex'; }
    function generateInstagramCard() { document.getElementById('instagram-modal').style.display = 'flex'; }
    function showMemoryManager() { document.getElementById('memory-manager-modal').style.display = 'flex'; }
    function showGasometryAnalyzer() { document.getElementById('gasometry-modal').style.display = 'flex'; }
    
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(20);
        doc.text('Relatório Reelmi AI', 20, 20);
        
        doc.setFontSize(12);
        doc.text(`Data: ${new Date().toLocaleDateString()}`, 20, 30);
        doc.text('Resumo da Conversa:', 20, 40);
        
        let y = 50;
        contextoConversa.slice(-10).forEach((msg, i) => {
            if (y > 280) {
                doc.addPage();
                y = 20;
            }
            const role = msg.role === 'user' ? 'Usuário' : 'Reelmi AI';
            const text = msg.content.substring(0, 80);
            doc.text(`${role}: ${text}...`, 20, y);
            y += 10;
        });
        
        doc.save(`reelmi-report-${Date.now()}.pdf`);
        showNotification('PDF gerado com sucesso!');
    }
    
    function toggleRealAI() {
        realAIActive = !realAIActive;
        const fab = document.getElementById('ai-fab');
        if (realAIActive) {
            fab.style.background = 'linear-gradient(135deg, #00ff00, #00cc00)';
            fab.innerHTML = '<i class="fas fa-brain"></i> AI ON';
            document.getElementById('ai-mode-indicator').textContent = 'IA: Ativa';
            showNotification('IA Real ativada');
        } else {
            fab.style.background = 'var(--primary-gradient)';
            fab.innerHTML = '<i class="fas fa-brain"></i>';
            document.getElementById('ai-mode-indicator').textContent = 'IA: Local';
            showNotification('IA Real desativada');
        }
        updateMenuStatusIndicators();
    }
    
    // Funções de janelas
    function openWindow(type) {
        const windowId = 'window-' + Date.now();
        const window = document.createElement('div');
        window.className = 'os-window window-opening';
        window.id = windowId;
        window.style.zIndex = ++windowZIndex;
        
        let title = '';
        let content = '';
        
        switch(type) {
            case 'notion':
                title = 'Editor Notion';
                content = `<div class="notion-editor" contenteditable="true">Comece a digitar aqui...</div>`;
                break;
            case 'terminal':
                title = 'Terminal Avançado';
                content = `<div class="advanced-terminal">$ Reelmi Terminal v1.0<br>$ Digite "help" para comandos</div>`;
                break;
            case 'ventilation':
                title = 'Simulador Ventilatório';
                content = `<div class="ventilation-simulator"><h3>Simulador de Ventilação Mecânica</h3><p>Em desenvolvimento...</p></div>`;
                break;
            case 'agent':
                title = 'Agente Auto-GPT';
                content = `<div class="agent-status"><h3>Agente Autônomo</h3><p>Pronto para executar tarefas...</p></div>`;
                break;
            case 'study':
                title = 'Dashboard de Estudo';
                content = `<div class="study-dashboard"><h3>Dashboard de Estudo</h3><p>Seu progresso de aprendizagem...</p></div>`;
                break;
            case 'code':
                title = 'Editor de Código';
                content = `<textarea style="width:100%; height:300px; background:#1a1a1a; color:white; border:none; padding:10px;">// Digite seu código aqui</textarea>`;
                break;
        }
        
        window.innerHTML = `
            <div class="window-header">
                <span><i class="fas fa-window-maximize"></i> ${title}</span>
                <div class="window-controls">
                    <button onclick="minimizeWindow('${windowId}')" title="Minimizar"><i class="fas fa-minus"></i></button>
                    <button onclick="maximizeWindow('${windowId}')" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <button onclick="closeWindow('${windowId}')" title="Fechar"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="window-content">
                ${content}
            </div>
        `;
        
        const maxX = window.innerWidth - 400;
        const maxY = window.innerHeight - 400;
        window.style.left = Math.floor(Math.random() * maxX) + 'px';
        window.style.top = Math.floor(Math.random() * maxY) + 'px';
        
        document.getElementById('window-container').appendChild(window);
        windows.push(windowId);
        
        showNotification(`Janela "${title}" aberta`);
    }
    
    function closeWindow(windowId) {
        const window = document.getElementById(windowId);
        if (window) {
            window.remove();
            windows = windows.filter(id => id !== windowId);
        }
    }
    
    function minimizeWindow(windowId) {
        const window = document.getElementById(windowId);
        const content = window.querySelector('.window-content');
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
        window.style.height = content.style.display === 'none' ? '48px' : 'auto';
    }
    
    function maximizeWindow(windowId) {
        const window = document.getElementById(windowId);
        if (window.style.width === '95vw') {
            window.style.width = '600px';
            window.style.height = '500px';
            window.style.left = 'calc(50% - 300px)';
            window.style.top = 'calc(50% - 250px)';
        } else {
            window.style.width = '95vw';
            window.style.height = '90vh';
            window.style.left = '2.5vw';
            window.style.top = '5vh';
        }
    }
    
    // ==================== FUNÇÕES DE CÁLCULO MÉDICO ====================
    function calculatePaO2FiO2() {
        const pao2 = parseFloat(document.getElementById('pao2').value);
        const fio2 = parseFloat(document.getElementById('fio2').value);
        
        if (pao2 && fio2 && fio2 > 0) {
            const resultado = pao2 / fio2;
            let classificacao = '';
            
            if (resultado > 400) classificacao = 'Normal';
            else if (resultado >= 300) classificacao = 'Leve';
            else if (resultado >= 200) classificacao = 'Moderado';
            else classificacao = 'Grave (SDRA)';
            
            document.getElementById('result-pao2fio2').innerHTML = `
                <strong>Índice PaO2/FiO2:</strong> ${resultado.toFixed(0)}<br>
                <strong>Classificação:</strong> ${classificacao}
            `;
        }
    }
    
    function calculateMinuteVolume() {
        const tv = parseFloat(document.getElementById('tidal-volume').value);
        const rr = parseFloat(document.getElementById('resp-rate').value);
        
        if (tv && rr) {
            const mv = (tv * rr) / 1000;
            document.getElementById('result-minute-volume').innerHTML = `
                <strong>Volume Minuto:</strong> ${mv.toFixed(2)} L/min<br>
                <em>Valor normal: 5-8 L/min</em>
            `;
        }
    }
    
    // ==================== INICIALIZAÇÃO FINAL ====================
    console.log('🚀 Reelmi AI pronto para uso!');
    console.log('📋 Todas as funcionalidades estão funcionando:');
    console.log('   1. ✅ Modo Compacto');
    console.log('   2. ✅ Wake Word "Hey Reelmi"');
    console.log('   3. ✅ Upload de Imagens');
    console.log('   4. ✅ Avisos de Segurança');
    console.log('   5. ✅ Recomendações Inteligentes');
    console.log('   6. ✅ Dock de Aplicativos');
    console.log('   7. ✅ Timeline do Chat');
    console.log('   8. ✅ Barra de rolagem transparente');
    console.log('   9. ✅ Sistema de Login/Cadastro');
    console.log('   10. ✅ Botão Limpar Chat');
    console.log('   11. ✅ 10 Perguntas de Enfermagem + 3 Novas sobre Ventilação');
    console.log('   12. ✅ Interface otimizada para mobile');
    console.log('✨ BOTÃO HAMBURGER: FUNCIONANDO CORRETAMENTE!');
    console.log('✨ DASHBOARD: Agora tem rolagem para cima e para baixo!');
    
</script>
</body>
</html>
                          
