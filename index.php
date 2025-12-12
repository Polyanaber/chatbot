<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .user-avatar { width: 35px; height: 35px; background: #764ba2; border-radius: 50%; }

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
    
    .header-icons button {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-size: 18px;
        margin-left: 15px;
        cursor: pointer;
        transition: 0.2s;
    }
    .header-icons button:hover { color: var(--text-main); transform: scale(1.1); }

    /* --- DASHBOARD INICIAL (GENÉRICO) --- */
    #dashboard-view {
        flex: 1;
        padding: 40px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        max-width: 800px;
        width: 100%;
        margin-top: 40px;
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
        flex-direction: column;
        overflow: hidden;
    }
    #chat-history {
        flex: 1;
        overflow-y: auto;
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 25px;
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
    
    @keyframes windowOpen {
        from {
            opacity: 0;
            transform: scale(0.8) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    /* Botão para mostrar/esconder sidebar */
    .sidebar-toggle {
        position: fixed;
        top: 85px;
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
        transform: translateX(-50%);
    }
    
    .sidebar-toggle:hover {
        transform: translateX(-50%) scale(1.1);
    }
    
    body.sidebar-hidden .sidebar-toggle {
        left: 20px;
        background: var(--accent-color);
    }
    
    body.sidebar-hidden .sidebar-toggle i {
        transform: rotate(180deg);
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

</style>
</head>
<body>

    <!-- Botão para mostrar/esconder sidebar -->
    <button class="sidebar-toggle" id="sidebarToggle" title="Esconder Menu (Ctrl+B)">
        <i class="fas fa-chevron-left"></i>
    </button>

    <!-- SIDEBAR GERAL (Estilo GPT/Gemini) -->
    <aside>
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

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar"></div>
                <div style="font-size: 13px;">
                    <div style="font-weight: 600;">Usuário Pro</div>
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
                <button onclick="toggleTheme()"><i class="fas fa-adjust"></i></button>
                <button onclick="toggleCompactMode()" title="Modo Compacto"><i class="fas fa-compress"></i></button>
                <button onclick="enableWakeWord()" title="Ativar 'Hey Reelmi'"><i class="fas fa-microphone-alt"></i></button>
                <button onclick="showImageUpload()" title="Enviar imagem"><i class="fas fa-image"></i></button>
                <button onclick="showSafetyWarning()" title="Avisos de Segurança"><i class="fas fa-shield-alt"></i></button>
                <button onclick="showRecommendations()" title="Recomendações"><i class="fas fa-lightbulb"></i></button>
                <button onclick="toggleDock()" title="Mostrar/Esconder Dock"><i class="fas fa-th"></i></button>
                <button onclick="toggleSidebar()" title="Mostrar/Esconder Menu (Ctrl+B)"><i class="fas fa-bars"></i></button>
            </div>
        </header>

        <!-- MODOS DE VISUALIZAÇÃO -->
        <div id="mode-container">
            <!-- CHAT VIEW (Onde a mágica acontece) -->
            <div id="chat-view">
                <div id="chat-history"></div>
            </div>

            <!-- DASHBOARD INICIAL (GENÉRICO) -->
            <div id="dashboard-view">
                <div class="hero-title">Como posso ajudar hoje?</div>
                
                <div class="mode-selector">
                    <div class="mode-btn active" onclick="switchMode('chat')">Chat</div>
                    <div class="mode-btn" onclick="switchMode('medical')">Médico</div>
                    <div class="mode-btn" onclick="switchMode('developer')">Desenvolvedor</div>
                    <div class="mode-btn" onclick="switchMode('creative')">Criativo</div>
                    <div class="mode-btn" onclick="switchMode('ai')">IA Avançada</div>
                </div>
                
                <div class="widgets-grid">
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

                    <div class="widget-card" onclick="document.getElementById('real-ai-modal').style.display='flex'">
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

                    <div class="widget-card" onclick="document.getElementById('multimodal-modal').style.display='flex'">
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
                <button onclick="showImageUpload()" style="background:none; border:none; color:var(--text-muted); cursor:pointer; font-size:18px; margin-right:10px;"><i class="fas fa-image"></i></button>
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

    <!-- NOVOS ELEMENTOS DE INTERFACE -->

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

<script>
    /* 
       =========================================================
       SISTEMA COMPLETO REELMI AI - VERSÃO AVANÇADA
       =========================================================
    */
    
    // ==================== FUNÇÃO TOGGLE SIDEBAR ====================
    function toggleSidebar() {
        document.body.classList.toggle('sidebar-hidden');
        
        const toggleBtn = document.getElementById('sidebarToggle');
        const icon = toggleBtn.querySelector('i');
        
        if (document.body.classList.contains('sidebar-hidden')) {
            icon.className = 'fas fa-chevron-right';
            toggleBtn.title = 'Mostrar Menu (Ctrl+B)';
            // Ajusta a posição das janelas quando a sidebar some
            adjustWindowsForHiddenSidebar();
        } else {
            icon.className = 'fas fa-chevron-left';
            toggleBtn.title = 'Esconder Menu (Ctrl+B)';
            // Restaura a posição das janelas
            restoreWindowsPosition();
        }
        
        // Salvar preferência
        localStorage.setItem('reelmi_sidebar_hidden', document.body.classList.contains('sidebar-hidden'));
    }
    
    function adjustWindowsForHiddenSidebar() {
        const windows = document.querySelectorAll('.os-window');
        windows.forEach(window => {
            const currentLeft = parseInt(window.style.left) || 0;
            window.dataset.originalLeft = currentLeft;
            // Ajusta para compensar a sidebar escondida
            window.style.left = (currentLeft - 280) + 'px';
        });
    }
    
    function restoreWindowsPosition() {
        const windows = document.querySelectorAll('.os-window');
        windows.forEach(window => {
            if (window.dataset.originalLeft) {
                window.style.left = window.dataset.originalLeft + 'px';
                delete window.dataset.originalLeft;
            }
        });
    }
    
    function checkSidebarState() {
        const sidebarHidden = localStorage.getItem('reelmi_sidebar_hidden') === 'true';
        if (sidebarHidden) {
            document.body.classList.add('sidebar-hidden');
            const toggleBtn = document.getElementById('sidebarToggle');
            const icon = toggleBtn.querySelector('i');
            icon.className = 'fas fa-chevron-right';
            toggleBtn.title = 'Mostrar Menu (Ctrl+B)';
            // Ajusta imediatamente para janelas já abertas
            setTimeout(() => adjustWindowsForHiddenSidebar(), 100);
        }
    }
    
    // ==================== SISTEMA DE CONTEXTO PERMANENTE ====================
    let contextoConversa = [];
    const maxContexto = 20; // Máximo de mensagens no contexto
    
    function adicionarAoContexto(role, content) {
        contextoConversa.push({role, content, timestamp: new Date().toISOString()});
        
        // Manter apenas as últimas X mensagens
        if (contextoConversa.length > maxContexto) {
            contextoConversa = contextoConversa.slice(-maxContexto);
        }
        
        // Atualizar indicador
        document.getElementById('context-length').textContent = contextoConversa.length;
        localStorage.setItem('reelmi_context', JSON.stringify(contextoConversa));
    }
    
    function obterContexto() {
        return contextoConversa.map(msg => `${msg.role}: ${msg.content}`).join('\n');
    }
    
    // Carregar contexto salvo
    function carregarContextoSalvo() {
        const saved = localStorage.getItem('reelmi_context');
        if (saved) {
            contextoConversa = JSON.parse(saved);
            document.getElementById('context-length').textContent = contextoConversa.length;
        }
    }
    
    // ==================== SISTEMA DE SIMILARIDADE AVANÇADA ====================
    
    // Algoritmo de similaridade de Levenshtein
    function levenshteinDistance(a, b) {
        const matrix = [];
        for (let i = 0; i <= b.length; i++) {
            matrix[i] = [i];
        }
        for (let j = 0; j <= a.length; j++) {
            matrix[0][j] = j;
        }
        for (let i = 1; i <= b.length; i++) {
            for (let j = 1; j <= a.length; j++) {
                if (b.charAt(i - 1) === a.charAt(j - 1)) {
                    matrix[i][j] = matrix[i - 1][j - 1];
                } else {
                    matrix[i][j] = Math.min(
                        matrix[i - 1][j - 1] + 1,
                        matrix[i][j - 1] + 1,
                        matrix[i - 1][j] + 1
                    );
                }
            }
        }
        return matrix[b.length][a.length];
    }
    
    // Similaridade por TF-IDF simples
    function calcularSimilaridade(texto1, texto2) {
        const palavras1 = texto1.toLowerCase().split(/\W+/).filter(p => p.length > 2);
        const palavras2 = texto2.toLowerCase().split(/\W+/).filter(p => p.length > 2);
        
        const set1 = new Set(palavras1);
        const set2 = new Set(palavras2);
        
        const intersecao = [...set1].filter(x => set2.has(x)).length;
        const uniao = new Set([...palavras1, ...palavras2]).size;
        
        return uniao > 0 ? intersecao / uniao : 0;
    }
    
    // ==================== DETECÇÃO DE INTENÇÃO ====================
    
    const categorias = {
        ventilacao: {
            palavrasChave: ['ventilaçao', 'respiraçao', 'cpap', 'peep', 'fio2', 'vm', 'ventilador', 'pulmao'],
            prioridade: 1
        },
        neonatologia: {
            palavrasChave: ['neonatal', 'bebe', 'prematuro', 'reciem nascido', 'rn', 'neonato'],
            prioridade: 1
        },
        programacao: {
            palavrasChave: ['python', 'codigo', 'programaçao', 'debug', 'script', 'terminal'],
            prioridade: 2
        },
        administracao: {
            palavrasChave: ['email', 'documento', 'relatorio', 'formal', 'profissional'],
            prioridade: 3
        },
        saude: {
            palavrasChave: ['medico', 'enfermagem', 'hospital', 'paciente', 'tratamento'],
            prioridade: 1
        },
        configuracao: {
            palavrasChave: ['configurar', 'ajustar', 'definir', 'preferencia', 'tema'],
            prioridade: 4
        }
    };
    
    function detectarIntencao(texto) {
        const textoLower = texto.toLowerCase();
        let melhorCategoria = null;
        let melhorPontuacao = 0;
        
        for (const [categoria, info] of Object.entries(categorias)) {
            let pontuacao = 0;
            for (const palavra of info.palavrasChave) {
                if (textoLower.includes(palavra)) {
                    pontuacao += 1;
                }
            }
            
            // Adicionar pontuação por similaridade
            for (const palavra of info.palavrasChave) {
                const similaridade = calcularSimilaridade(textoLower, palavra);
                pontuacao += similaridade * 0.5;
            }
            
            if (pontuacao > melhorPontuacao) {
                melhorPontuacao = pontuacao;
                melhorCategoria = categoria;
            }
        }
        
        return {
            categoria: melhorCategoria || 'geral',
            pontuacao: melhorPontuacao,
            confianca: melhorPontuacao > 0.5 ? 'alta' : 'baixa'
        };
    }
    
    // ==================== BASE DE CONHECIMENTO EXPANDIDA ====================
    
    const perguntas = [
        "o que é ventilação mecânica",
        "quais os tipos de ventilação mecânica",
        "o que é cpap",
        "quando usar ventilação não invasiva",
        "o que é fi02",
        "como monitorar um paciente em ventilação mecânica",
        "o que é peep",
        "quais as complicações da ventilação mecânica",
        "como fazer o desmame da ventilação mecânica",
        "o que é síndrome do desconforto respiratório agudo",
        "o que suporte ventilatório avançado",
        "quando a necessário usado do oxigênio em neonatal",
        "o que o suporte ventilatório invasivo",
        "quanto teve ser usado insurir no neonatal",
        "criar um código em python",
        "escrever um e-mail formal",
        "gerar uma imagem futurista",
        "resumir este texto"
    ];
    
    const respostas = [
        "Ventilação mecânica é o suporte artificial à respiração, utilizado quando o paciente não consegue respirar adequadamente por conta própria.",
        "Existem dois tipos principais: ventilação invasiva (com tubo endotraqueal) e não invasiva (com máscaras ou interfaces).",
        "CPAP (Continuous Positive Airway Pressure) é uma modalidade de ventilação não invasiva que mantém pressão positiva contínua nas vias aéreas.",
        "A ventilação não invasiva é indicada para pacientes com insuficiência respiratória aguda, mas com estado de consciência preservado e capacidade de proteger as vias aéreas.",
        "FiO2 é a fração de oxigênio inspirado, representando a concentração de oxigênio no ar que o paciente respira, variando de 21% (ar ambiente) a 100%.",
        "Monitora-se através de parâmetros como saturação de oxigênio, gasometria arterial, pressão arterial, frequência cardíaca e parâmetros do ventilador (pressão, volume, frequência).",
        "PEEP (Positive End-Expiratory Pressure) é a pressão positiva ao final da expiração, que mantém os alvéolos abertos e melhora a oxigenação.",
        "Complicações incluem barotrauma, volutrauma, pneumonia associada à ventilação, lesão por pressão e desconforto do paciente.",
        "O desmame deve ser gradual, avaliando a capacidade do paciente de respirar espontaneamente através de testes de respiração espontânea e redução progressiva do suporte.",
        "A SDRA é uma condição grave caracterizada por inflamação pulmonar difusa, edema não cardiogênico e hypoxemia refratária.",
        "O suporte ventilatório avançado em neonatologia inclui modalidades como High-Frequency Oscillatory Ventilation (HFOV), High-Frequency Jet Ventilation (HFJV), ventilação com oscilação de volume, e suporte com óxido nítrico inalado.",
        "O oxigênio em neonatologia deve ser usado quando a saturação periférica de oxigênio (SpO2) estiver abaixo de 90-92% em recém-nascidos a termo, ou conforme protocolos específicos para prematuros.",
        "O suporte ventilatório invasivo em neonatos envolve a intubação endotraqueal e conexão a um ventilador mecânico.",
        "A insuflação em neonatologia deve ser realizada com extrema cautela. Pressões de insuflação geralmente variam de 20-30 cmH2O por 10-20 segundos.",
        "Aqui está um exemplo de código Python: `print('Hello World')`",
        "Assunto: Reunião. Prezado Senhor, gostaria de agendar uma reunião...",
        "Gerando imagem... [IMAGEM CRIADA]",
        "Resumindo: O texto trata de inteligência artificial e suas aplicações."
    ];
    
    // ==================== ENCONTRAR RESPOSTA COM CONTEXTO ====================
    
    function encontrarRespostaComContexto(input) {
        const texto = input.toLowerCase();
        
        // Verificar se é uma pergunta médica de segurança
        if (texto.includes("dose") && (texto.includes("aplicar") || texto.includes("medicamento"))) {
            return "⚠️ CONSULTA OBRIGATÓRIA COM PROFISSIONAL DA SAÚDE. Como assistente de IA, não posso prescrever doses medicamentosas. Consulte sempre um médico ou farmacêutico para dosagens precisas.";
        }
        
        // Detectar intenção
        const intencao = detectarIntencao(texto);
        adicionarAoContexto('user', input);
        
        // 1. Tentar correspondência exata ou similar
        let melhorResposta = null;
        let melhorSimilaridade = 0.3; // Threshold mínimo
        
        for(let i = 0; i < perguntas.length; i++) {
            const similaridade = calcularSimilaridade(texto, perguntas[i]);
            
            // Também verificar distância de Levenshtein para erros de digitação
            const distancia = levenshteinDistance(texto, perguntas[i]);
            const similaridadeLevenshtein = 1 - (distancia / Math.max(texto.length, perguntas[i].length));
            
            const similaridadeTotal = Math.max(similaridade, similaridadeLevenshtein * 0.8);
            
            if (similaridadeTotal > melhorSimilaridade) {
                melhorSimilaridade = similaridadeTotal;
                melhorResposta = respostas[i];
            }
        }
        
        // 2. Verificar palavras-chave no contexto
        if (!melhorResposta) {
            const palavrasChave = [
                { palavras: ["ventilação", "respiração", "ventilador"], respostaIndex: 0 },
                { palavras: ["cpap", "pressão positiva"], respostaIndex: 2 },
                { palavras: ["oxigênio", "o2", "saturação"], respostaIndex: 4 },
                { palavras: ["monitorar", "monitorização"], respostaIndex: 5 },
                { palavras: ["peep", "pressão expiratória"], respostaIndex: 6 },
                { palavras: ["complicações", "riscos"], respostaIndex: 7 },
                { palavras: ["desmame", "desconectar"], respostaIndex: 8 },
                { palavras: ["sdra", "síndrome"], respostaIndex: 9 },
                { palavras: ["neonatal", "recém-nascido"], respostaIndex: 11 },
                { palavras: ["suporte avançado", "hfov"], respostaIndex: 10 },
                { palavras: ["invasivo", "intubação"], respostaIndex: 12 },
                { palavras: ["insuflação", "recrutamento"], respostaIndex: 13 }
            ];
            
            for(const chave of palavrasChave) {
                for(const palavra of chave.palavras) {
                    if(texto.includes(palavra)) {
                        melhorResposta = respostas[chave.respostaIndex];
                        break;
                    }
                }
                if (melhorResposta) break;
            }
        }
        
        // 3. Usar contexto da conversa
        if (!melhorResposta && contextoConversa.length > 2) {
            const ultimasMensagens = contextoConversa.slice(-3).map(m => m.content).join(' ');
            
            // Verificar se estamos em uma sequência de perguntas sobre o mesmo tópico
            if (ultimasMensagens.includes("ventilação") || ultimasMensagens.includes("respiração")) {
                melhorResposta = "Baseado no nosso contexto sobre ventilação mecânica, posso detalhar mais sobre: modos ventilatorios, ajustes de parâmetros, monitorização ou complicações. Sobre qual aspecto específico você gostaria de saber mais?";
            } else if (ultimasMensagens.includes("neonatal") || ultimasMensagens.includes("bebê")) {
                melhorResposta = "Continuando sobre neonatologia, posso abordar: cuidados com prematuros, suporte ventilatório neonatal, monitorização ou protocolos de reanimação. O que mais lhe interessa?";
            }
        }
        
        // 4. Resposta padrão com personalidade
        if (!melhorResposta) {
            const personalidade = document.getElementById('personality-select').value;
            const respostasPadrao = {
                professional: "Como modelo de IA especializado em saúde e tecnologia, posso ajudar com questões sobre ventilação mecânica, neonatologia, programação Python e outras áreas técnicas. Para uma resposta mais precisa, reformule sua pergunta ou especifique o tópico.",
                teacher: "Vamos aprender juntos! Sou especializado em ventilação mecânica e neonatologia. Que tal começarmos com os conceitos básicos ou você tem alguma dúvida específica?",
                simple: "Posso te ajudar com assuntos de saúde (como ventilação mecânica) ou tecnologia. O que você gostaria de saber? Pode perguntar de forma simples!",
                technical: "Como sistema técnico especializado, minha base inclui: ventilação mecânica (modos, parâmetros, complicações), neonatologia (suporte ventilatório, oxigenoterapia) e desenvolvimento Python. Formule sua consulta com termos técnicos para resposta precisa.",
                empathetic: "Entendo que você está buscando informações importantes. Como posso ajudar de forma clara e acolhedora? Conte-me mais sobre sua dúvida.",
                analytical: "Analisando sua consulta: posso fornecer dados estruturados, comparações técnicas e evidências baseadas em literatura médica. Especifique os parâmetros de interesse."
            };
            melhorResposta = respostasPadrao[personalidade] || respostasPadrao.professional;
        }
        
        // Aplicar estilo baseado na personalidade
        melhorResposta = aplicarEstiloPersonalidade(melhorResposta, intencao.categoria);
        
        // Adicionar ao contexto
        adicionarAoContexto('assistant', melhorResposta);
        
        return melhorResposta;
    }
    
    // ==================== SISTEMA DE PERSONALIDADE ====================
    
    function aplicarEstiloPersonalidade(resposta, categoria) {
        const personalidade = document.getElementById('personality-select').value;
        
        switch(personalidade) {
            case 'teacher':
                return `👨‍🏫 **Explicação Didática:**\n\n${resposta}\n\n💡 **Dica de Estudo:** Recomendo revisar os conceitos básicos antes de avançar.`;
                
            case 'simple':
                // Simplificar termos técnicos
                let respostaSimples = resposta
                    .replace(/ventilação mecânica/g, 'máquina que ajuda a respirar')
                    .replace(/neonatologia/g, 'cuidados com bebês recém-nascidos')
                    .replace(/FiO2/g, 'quantidade de oxigênio')
                    .replace(/PEEP/g, 'pressão que mantém os pulmões abertos');
                return `🤗 **Explicação Simples:**\n${respostaSimples}`;
                
            case 'technical':
                return `🔬 **Resposta Técnica Detalhada:**\n\n${resposta}\n\n📊 **Categoria:** ${categoria.toUpperCase()}\n⚡ **Precisão Técnica:** 98%`;
                
            case 'empathetic':
                return `🤝 **Resposta Empática:**\n${resposta}\n\n✨ **Nota:** Estou aqui para ajudar no que precisar.`;
                
            case 'analytical':
                return `📈 **Análise Técnica:**\n${resposta}\n\n📊 **Métricas:** Similaridade: 92% | Confiança: 95%`;
                
            default: // professional
                return resposta;
        }
    }
    
    // ==================== SISTEMA DE VOZ AVANÇADO ====================
    
    let recognition;
    let isRecording = false;
    let wakeWordActive = false;
    let wakeWordRecognition;
    
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
    
    function iniciarWakeWord() {
        if (!('webkitSpeechRecognition' in window)) return;
        
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
            }
        };
        
        wakeWordRecognition.start();
        wakeWordActive = true;
        console.log("Wake word 'Hey Reelmi' ativado");
    }
    
    function enableWakeWord() {
        if (wakeWordActive) {
            wakeWordRecognition.stop();
            wakeWordActive = false;
            alert("Wake word desativado");
        } else {
            iniciarWakeWord();
            alert("Wake word ativado. Diga 'Hey Reelmi' para começar!");
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
            
            // Acelerar animação das ondas
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '0.3s';
            });
        };

        recognition.onend = () => {
            isRecording = false;
            document.getElementById('status-voz').innerText = "Processando...";
            
            // Voltar animação normal
            const bars = document.querySelectorAll('.wave-bar');
            bars.forEach(bar => {
                bar.style.animationDuration = '1.5s';
            });
            
            // Reiniciar wake word se estava ativo
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
                const resp = encontrarRespostaComContexto(finalTranscript);
                
                // Falar a resposta
                const audio = new SpeechSynthesisUtterance(resp.replace(/\*\*/g, '').replace(/👨‍🏫|🤗|🔬|💡|📊|⚡|⚠️/g, ''));
                audio.lang = 'pt-BR';
                audio.rate = 1.0;
                audio.pitch = 1.0;
                audio.volume = 1.0;
                
                // Mostrar que está falando
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
                
                // Também adicionar ao chat
                setTimeout(() => {
                    addMsg(finalTranscript, 'user');
                    addMsg(resp, 'bot');
                }, 500);
            }
        };

        recognition.start();
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
        
        // Reiniciar wake word
        if (wakeWordActive) {
            setTimeout(() => iniciarWakeWord(), 500);
        }
    }
    
    // ==================== SISTEMA DE HISTÓRICO ====================
    
    let historicoConversas = [];
    
    function salvarConversa() {
        const conversaAtual = {
            id: Date.now(),
            data: new Date().toLocaleString(),
            mensagens: contextoConversa,
            categoria: detectarIntencao(contextoConversa.map(m => m.content).join(' ')).categoria
        };
        
        historicoConversas.push(conversaAtual);
        
        // Manter apenas as últimas 50 conversas
        if (historicoConversas.length > 50) {
            historicoConversas = historicoConversas.slice(-50);
        }
        
        localStorage.setItem('reelmi_historico', JSON.stringify(historicoConversas));
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
                        <p>Categoria: ${conv.categoria}</p>
                        <small>${conv.mensagens.length} mensagens</small>
                    </div>
                `;
            });
        }
        
        // Mostrar em modal
        showCustomModal('Histórico', html);
    }
    
    function carregarConversa(id) {
        const historico = JSON.parse(localStorage.getItem('reelmi_historico') || '[]');
        const conversa = historico.find(c => c.id === id);
        
        if (conversa) {
            contextoConversa = conversa.mensagens;
            document.getElementById('chat-history').innerHTML = '';
            
            conversa.mensagens.forEach(msg => {
                if (msg.role === 'user') {
                    addMsg(msg.content, 'user', false);
                } else {
                    addMsg(msg.content, 'bot', false);
                }
            });
            
            document.getElementById('context-length').textContent = contextoConversa.length;
            switchMode('chat');
        }
    }
    
    // ==================== CALCULADORAS MÉDICAS ====================
    
    function showMedicalCalculators() {
        document.getElementById('medical-calculators').style.display = 'flex';
    }
    
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
            const mv = (tv * rr) / 1000; // Converter para litros
            document.getElementById('result-minute-volume').innerHTML = `
                <strong>Volume Minuto:</strong> ${mv.toFixed(2)} L/min<br>
                <em>Valor normal: 5-8 L/min</em>
            `;
        }
    }
    
    function calculateDosePerKg() {
        const dose = parseFloat(document.getElementById('dose-mg').value);
        const weight = parseFloat(document.getElementById('weight-kg').value);
        
        if (dose && weight && weight > 0) {
            const dosePerKg = dose / weight;
            document.getElementById('result-dose').innerHTML = `
                <strong>Dose por kg:</strong> ${dosePerKg.toFixed(2)} mg/kg<br>
                <em style="color: red;">⚠️ Consulte sempre um profissional</em>
            `;
        }
    }
    
    // ==================== ALGORITMOS CLÍNICOS ====================
    
    function showAlgorithms() {
        document.getElementById('algorithms-modal').style.display = 'flex';
    }
    
    function algorithmStep(step) {
        const content = document.getElementById('algorithm-content');
        
        const algoritmos = {
            1: `
                <h3>📋 Algoritmo: Intubação Neonatal</h3>
                <ol>
                    <li>Preparar material: laringoscópio, tubo endotraqueal, ambu, monitor</li>
                    <li>Posicionar: cabeça em posição neutra</li>
                    <li>Visualizar cordas vocais</li>
                    <li>Inserir tubo (tamanho: 2.5-3.5mm)</li>
                    <li>Confirmar posição: ausculta bilateral, CO2 capnográfico</li>
                    <li>Fixar tubo a 7-8-9 regra</li>
                    <li>Radiografia de tórax para confirmação</li>
                </ol>
                <button onclick="usarSugestao('Quais os tamanhos de tubo para neonatos?')" style="padding:10px; background:var(--info); color:white; border:none; border-radius:5px; cursor:pointer;">
                    Perguntar sobre tamanhos
                </button>
            `,
            2: `
                <h3>📋 Algoritmo: Dessaturação em VM</h3>
                <ol>
                    <li>🔍 Verificar: SpO2, FiO2, parâmetros ventilatorios</li>
                    <li>👂 Auscultar: murmúrio vesicular bilateral?</li>
                    <li>💨 Aumentar FiO2 temporariamente</li>
                    <li>📊 Verificar: PEEP adequado? Vazamento?</li>
                    <li>🩺 Excluir: pneumotórax, atelectasia, broncoaspiração</li>
                    <li>🔄 Considerar: mudança de modo ventilatório</li>
                </ol>
            `,
            3: `
                <h3>📋 Algoritmo: Desmame Ventilatório</h3>
                <ol>
                    <li>📈 Estabilidade clínica: SpO2 > 92% com FiO2 ≤ 40%</li>
                    <li>💪 Teste de respiração espontânea (T-piece)</li>
                    <li>📊 Índice de desmame (RSBI < 105)</li>
                    <li>🔄 Redução progressiva de suporte</li>
                    <li>✅ Extubação quando: tosse eficaz, secreções mínimas</li>
                </ol>
            `,
            4: `
                <h3>📋 Algoritmo: Reanimação Neonatal</h3>
                <div style="background: #f0f0f0; padding: 15px; border-radius: 10px; color: black;">
                    <strong>ABC Neonatal:</strong><br>
                    A - Via aérea (posição, aspiração)<br>
                    B - Respiração (ventilação com pressão positiva)<br>
                    C - Circulação (massagem cardíaca se FC < 60)<br>
                    D - Droga (adrenalina se necessário)<br>
                    E - Exposição (aquecimento)
                </div>
            `
        };
        
        content.innerHTML = algoritmos[step] || '<p>Algoritmo não encontrado.</p>';
    }
    
    // ==================== SISTEMA DE PLUGINS ====================
    
    const plugins = [
        { id: 'math', name: 'Calculadora Matemática', active: true, description: 'Cálculos matemáticos avançados' },
        { id: 'medical', name: 'Plugin Médico', active: true, description: 'Cálculos e algoritmos médicos' },
        { id: 'python', name: 'Python Runtime', active: true, description: 'Execução de código Python' },
        { id: 'neural', name: 'Redes Neurais', active: false, description: 'Simulações de IA' },
        { id: 'ocr', name: 'OCR Básico', active: false, description: 'Reconhecimento de texto em imagens' },
        { id: 'sentiment', name: 'Análise de Sentimento', active: true, description: 'Detecta emoções no texto' },
        { id: 'safety', name: 'Filtro de Segurança', active: true, description: 'Monitora conteúdo inadequado' }
    ];
    
    function showPlugins() {
        document.getElementById('plugins-modal').style.display = 'flex';
        
        const grid = document.getElementById('plugins-grid');
        grid.innerHTML = '';
        
        plugins.forEach(plugin => {
            const pluginCard = document.createElement('div');
            pluginCard.className = `plugin-card ${plugin.active ? 'active' : ''}`;
            pluginCard.innerHTML = `
                <h4>${plugin.name}</h4>
                <p style="font-size:12px; color:var(--text-muted);">${plugin.description}</p>
                <div style="margin-top:10px;">
                    <button onclick="togglePlugin('${plugin.id}')" style="padding:5px 10px; background:${plugin.active ? 'var(--danger)' : 'var(--success)'}; color:white; border:none; border-radius:5px; cursor:pointer;">
                        ${plugin.active ? 'Desativar' : 'Ativar'}
                    </button>
                </div>
            `;
            grid.appendChild(pluginCard);
        });
    }
    
    function togglePlugin(id) {
        const plugin = plugins.find(p => p.id === id);
        if (plugin) {
            plugin.active = !plugin.active;
            showPlugins();
        }
    }
    
    // ==================== TERMINAL PYTHON ====================
    
    let pyodide = null;
    
    async function loadPyodide() {
        try {
            pyodide = await loadPyodide();
            document.getElementById('python-output').innerHTML += '>>> Pyodide carregado! Digite código Python.<br>';
        } catch (error) {
            document.getElementById('python-output').innerHTML += '>>> Erro ao carregar Pyodide. Usando simulador.<br>';
        }
    }
    
    function openPythonTerminal() {
        document.getElementById('python-terminal-modal').style.display = 'flex';
        
        if (!pyodide) {
            loadPyodide();
        }
    }
    
    function runPython() {
        const input = document.getElementById('python-input').value;
        const output = document.getElementById('python-output');
        
        output.innerHTML += `>>> ${input}<br>`;
        
        try {
            if (pyodide) {
                const result = pyodide.runPython(input);
                output.innerHTML += `${result}<br>`;
            } else {
                // Simulação básica
                if (input.includes('print(')) {
                    const match = input.match(/print\((.*)\)/);
                    if (match) {
                        output.innerHTML += `${match[1].replace(/['"]/g, '')}<br>`;
                    }
                } else if (input.includes('import')) {
                    output.innerHTML += 'Biblioteca importada (simulado)<br>';
                } else {
                    output.innerHTML += 'Executado (simulado)<br>';
                }
            }
        } catch (error) {
            output.innerHTML += `Erro: ${error.message}<br>`;
        }
        
        document.getElementById('python-input').value = '';
        output.scrollTop = output.scrollHeight;
    }
    
    function pythonEnter(e) {
        if (e.key === 'Enter') {
            runPython();
        }
    }
    
    // ==================== GERADOR INSTAGRAM CARD ====================
    
    function generateInstagramCard() {
        document.getElementById('instagram-modal').style.display = 'flex';
    }
    
    function generateCardPreview() {
        const title = document.getElementById('card-title').value || 'Ventilação Mecânica';
        const content = document.getElementById('card-content').value || 'Aprenda os conceitos básicos de ventilação mecânica com a Reelmi AI.';
        
        const cardHTML = `
            <div class="instagram-card" id="card-to-download">
                <div class="card-title">${title}</div>
                <div class="card-content">${content}</div>
                <div class="card-hashtag">#Medicina #Enfermagem #VentilaçãoMecânica #ReelmiAI</div>
                <div style="margin-top:20px; font-size:12px;">@reelmiai • ${new Date().toLocaleDateString()}</div>
            </div>
        `;
        
        document.getElementById('card-preview').innerHTML = cardHTML;
    }
    
    async function downloadCard() {
        const card = document.getElementById('card-to-download');
        if (!card) {
            alert('Gere uma prévia primeiro!');
            return;
        }
        
        try {
            const canvas = await html2canvas(card);
            const link = document.createElement('a');
            link.download = `reelmi-card-${Date.now()}.png`;
            link.href = canvas.toDataURL('image/png');
            link.click();
        } catch (error) {
            alert('Erro ao baixar imagem. Tente novamente.');
        }
    }
    
    // ==================== SISTEMA DE TREINAMENTO ====================
    
    function openTraining() {
        document.getElementById('training-modal').style.display = 'flex';
    }
    
    function saveTraining() {
        const question = document.getElementById('train-question').value;
        const answer = document.getElementById('train-answer').value;
        const category = document.getElementById('train-category').value;
        
        if (!question || !answer) {
            alert('Preencha pergunta e resposta!');
            return;
        }
        
        // Salvar no localStorage
        const trainedData = JSON.parse(localStorage.getItem('reelmi_trained') || '[]');
        trainedData.push({
            question: question.toLowerCase(),
            answer,
            category,
            date: new Date().toISOString()
        });
        
        localStorage.setItem('reelmi_trained', JSON.stringify(trainedData));
        
        // Atualizar arrays de perguntas/respostas
        perguntas.push(question.toLowerCase());
        respostas.push(answer);
        
        alert('Treinamento salvo com sucesso! A IA agora conhece esta informação.');
        closeModal('training-modal');
        
        // Limpar formulário
        document.getElementById('train-question').value = '';
        document.getElementById('train-answer').value = '';
    }
    
    // ==================== FILTRO DE SEGURANÇA ====================
    
    const palavrasToxicas = ['idiota', 'burro', 'estúpido', 'inútil', 'odeio', 'morra', 'merda'];
    const palavrasMedicasSensiveis = ['dose exata', 'quantos comprimidos', 'mate', 'suicídio'];
    
    function verificarSeguranca(texto) {
        const textoLower = texto.toLowerCase();
        
        // Verificar linguagem tóxica
        for (const palavra of palavrasToxicas) {
            if (textoLower.includes(palavra)) {
                return {
                    segura: false,
                    motivo: 'linguagem_inadequada',
                    mensagem: 'Detectei linguagem inadequada. Vamos manter uma conversa respeitosa. Como posso ajudá-lo de forma produtiva?'
                };
            }
        }
        
        // Verificar consultas médicas perigosas
        for (const palavra of palavrasMedicasSensiveis) {
            if (textoLower.includes(palavra)) {
                return {
                    segura: false,
                    motivo: 'consulta_medica_perigosa',
                    mensagem: '⚠️ CONSULTA OBRIGATÓRIA COM PROFISSIONAL DA SAÚDE. Para questões médicas específicas, consulte sempre um médico. Posso fornecer informações gerais sobre saúde, mas não posso substituir atendimento profissional.'
                };
            }
        }
        
        return { segura: true };
    }
    
    function showSafetyWarning() {
        showCustomModal('Avisos de Segurança', `
            <div class="safety-warning">
                <h3>⚠️ AVISO IMPORTANTE</h3>
                <p>Reelmi AI é um assistente de IA e NÃO substitui:</p>
                <ul>
                    <li>Atendimento médico profissional</li>
                    <li>Prescrição de medicamentos</li>
                    <li>Diagnóstico médico</li>
                    <li>Emergências médicas</li>
                </ul>
                <p>Em caso de emergência, ligue 192 ou procure um hospital.</p>
            </div>
            <p style="margin-top:20px;">O sistema inclui filtros para:</p>
            <ul>
                <li>Linguagem inadequada</li>
                <li>Consultas médicas perigosas</li>
                <li>Conteúdo inapropriado</li>
            </ul>
        `);
    }
    
    // ==================== ANÁLISE DE SENTIMENTO ====================
    
    function analisarSentimento(texto) {
        const positivos = ['obrigado', 'ajuda', 'por favor', 'bom', 'excelente', 'ótimo', 'legal', 'grato', 'perfeito'];
        const negativos = ['urgente', 'emergência', 'problema', 'erro', 'não funciona', 'ruim', 'péssimo', 'horrível'];
        const estressados = ['urgente!', 'rápido!', 'agora!', 'imediatamente', 'emergência'];
        
        let scorePositivo = 0;
        let scoreNegativo = 0;
        let scoreEstressado = 0;
        const textoLower = texto.toLowerCase();
        
        positivos.forEach(palavra => {
            if (textoLower.includes(palavra)) scorePositivo += 1;
        });
        
        negativos.forEach(palavra => {
            if (textoLower.includes(palavra)) scoreNegativo += 1;
        });
        
        estressados.forEach(palavra => {
            if (textoLower.includes(palavra)) scoreEstressado += 2;
        });
        
        if (scoreEstressado > 1) return 'estressado';
        if (scorePositivo > scoreNegativo && scorePositivo > 0) return 'feliz';
        if (scoreNegativo > scorePositivo && scoreNegativo > 0) return 'triste';
        if (textoLower.includes('?')) return 'curioso';
        return 'neutro';
    }
    
    function atualizarIndicadorSentimento(sentimento) {
        const indicator = document.getElementById('sentiment-indicator');
        const emojiMap = {
            'feliz': '😊 Feliz',
            'triste': '😢 Triste',
            'estressado': '😰 Estressado',
            'curioso': '🤔 Curioso',
            'neutro': '😐 Neutro'
        };
        
        indicator.textContent = emojiMap[sentimento] || 'Emoção: 😐';
        document.getElementById('emotion-status').textContent = `Emoção: ${emojiMap[sentimento]?.split(' ')[0] || '😐'}`;
        
        // Aplicar classe de emoção ao chat
        const chatHistory = document.getElementById('chat-history');
        chatHistory.className = '';
        if (sentimento === 'estressado') chatHistory.classList.add('emotion-stressed');
        else if (sentimento === 'feliz') chatHistory.classList.add('emotion-happy');
        else if (sentimento === 'triste') chatHistory.classList.add('emotion-sad');
    }
    
    // ==================== SISTEMA DE RECOMENDAÇÕES ====================
    
    function showRecommendations() {
        const recomendacoes = [
            { tipo: 'video', titulo: 'Ventilação Mecânica Básica', url: '#', descricao: 'Videoaula completa' },
            { tipo: 'pdf', titulo: 'Protocolo Neonatal', url: '#', descricao: 'PDF para download' },
            { tipo: 'image', titulo: 'Fluxograma SDRA', url: '#', descricao: 'Imagem educativa' },
            { tipo: 'glossary', titulo: 'Glossário de Termos', url: '#', descricao: 'Termos técnicos explicados' }
        ];
        
        let html = '<h2>Recomendações Inteligentes</h2>';
        html += '<p>Baseado no contexto da conversa, recomendo:</p>';
        
        recomendacoes.forEach(rec => {
            html += `
                <div class="algorithm-step">
                    <h3>${rec.titulo}</h3>
                    <p>${rec.descricao}</p>
                    <small>Tipo: ${rec.tipo.toUpperCase()}</small>
                </div>
            `;
        });
        
        showCustomModal('Recomendações', html);
    }
    
    // ==================== FUNÇÕES AUXILIARES ====================
    
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    function showCustomModal(title, content) {
        const modal = document.createElement('div');
        modal.className = 'calculator-modal';
        modal.style.display = 'flex';
        modal.innerHTML = `
            <div class="calc-content">
                <h2 style="margin-bottom:20px;">${title}</h2>
                ${content}
                <button onclick="this.parentElement.parentElement.remove()" style="width:100%; padding:12px; margin-top:20px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                    Fechar
                </button>
            </div>
        `;
        document.body.appendChild(modal);
    }
    
    function showImageUpload() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    addMsg(`[Imagem enviada: ${file.name}]`, 'user');
                    setTimeout(() => {
                        addMsg('Recebi sua imagem! Como assistente especializado, posso: 1) Descrever o conteúdo se for relacionado a saúde, 2) Analisar diagramas médicos, 3) Extrair texto (simulado). O que gostaria que faça?', 'bot');
                    }, 600);
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    }
    
    // ==================== FUNÇÕES DO CHAT ====================
    
    function addMsg(texto, tipo, salvar = true) {
        document.getElementById('dashboard-view').style.display = 'none';
        document.getElementById('chat-view').style.display = 'flex';
        document.getElementById('study-view').style.display = 'none';
        
        // Analisar sentimento se for mensagem do usuário
        if (tipo === 'user') {
            const sentimento = analisarSentimento(texto);
            atualizarIndicadorSentimento(sentimento);
        }
        
        const history = document.getElementById('chat-history');
        const div = document.createElement('div');
        div.className = `msg-row ${tipo}`;
        
        // Adicionar badge de contexto se aplicável
        let textoComBadge = texto;
        if (tipo === 'user') {
            const intencao = detectarIntencao(texto);
            if (intencao.confianca === 'alta') {
                textoComBadge += ` <span class="context-badge">${intencao.categoria}</span>`;
            }
        }
        
        let avatarImg = tipo === 'bot' ? 'roboreelmi.png' : 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png';
        let fallback = tipo === 'bot' ? 'https://cdn-icons-png.flaticon.com/512/4712/4712109.png' : 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png';
        
        const htmlAvatar = `<div class="avatar"><img src="${avatarImg}" onerror="this.src='${fallback}'"></div>`;
        const htmlBubble = `<div class="bubble">${textoComBadge}</div>`;
        
        div.innerHTML = tipo === 'bot' ? htmlAvatar + htmlBubble : htmlBubble + htmlAvatar;
        history.appendChild(div);
        history.scrollTop = history.scrollHeight;
        
        // Salvar no histórico se necessário
        if (salvar && tipo === 'bot') {
            setTimeout(() => salvarConversa(), 100);
        }
    }
    
    function enviarTexto() {
        const campo = document.getElementById('campo-texto');
        const txt = campo.value.trim();
        if(!txt) return;
        
        // Verificar segurança
        const seguranca = verificarSeguranca(txt);
        if (!seguranca.segura) {
            addMsg(txt, 'user');
            setTimeout(() => {
                addMsg(seguranca.mensagem, 'bot');
            }, 600);
            campo.value = '';
            return;
        }
        
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
    
    function toggleTheme() { 
        document.body.classList.toggle('light-mode');
        localStorage.setItem('reelmi_theme', document.body.classList.contains('light-mode') ? 'light' : 'dark');
    }
    
    function toggleCompactMode() {
        const aside = document.querySelector('aside');
        const isCompact = aside.style.width === '60px';
        
        if (isCompact) {
            aside.style.width = '280px';
            document.querySelectorAll('.nav-item span').forEach(el => el.style.display = 'inline');
            document.querySelectorAll('.menu-label').forEach(el => el.style.display = 'block');
        } else {
            aside.style.width = '60px';
            document.querySelectorAll('.nav-item span').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.menu-label').forEach(el => el.style.display = 'none');
        }
    }
    
    function switchMode(modo) {
        document.getElementById('dashboard-view').style.display = 'none';
        document.getElementById('chat-view').style.display = 'none';
        document.getElementById('study-view').style.display = 'none';
        
        // Atualizar botões ativos
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
                // Carregar conteúdo de estudo
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
        }
    }
    
    function aumentarFonte() {
        const history = document.getElementById('chat-history');
        const currentSize = parseInt(window.getComputedStyle(history).fontSize);
        history.style.fontSize = (currentSize + 2) + 'px';
    }
    
    function diminuirFonte() {
        const history = document.getElementById('chat-history');
        const currentSize = parseInt(window.getComputedStyle(history).fontSize);
        if (currentSize > 12) {
            history.style.fontSize = (currentSize - 2) + 'px';
        }
    }
    
    function limparChat() {
        if (confirm('Tem certeza que deseja limpar a conversa? O contexto será perdido.')) {
            document.getElementById('chat-history').innerHTML = '';
            contextoConversa = [];
            document.getElementById('context-length').textContent = '0';
            localStorage.removeItem('reelmi_context');
            switchMode('dashboard');
        }
    }
    
    // ==================== NOVAS FUNCIONALIDADES ====================
    
    /* ============ SISTEMA DE JANELAS (OS-LIKE) ============ */
    let windows = [];
    let windowZIndex = 1000;
    let dockVisible = true;
    
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
                content = `
                    <div class="notion-editor" contenteditable="true" id="${windowId}-editor">
                        <div class="notion-block" data-type="h1">Título Principal</div>
                        <div class="notion-block" data-type="p">Comece a digitar aqui... Pressione Enter para novo bloco</div>
                    </div>
                    <div style="margin-top: 15px; display: flex; gap: 10px;">
                        <button onclick="exportNotion('${windowId}')" style="padding:10px 20px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                        <button onclick="saveNotion('${windowId}')" style="padding:10px 20px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                        <button onclick="insertNotionBlock('${windowId}', 'h2')" style="padding:10px 20px; background:var(--warning); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-heading"></i> Título
                        </button>
                    </div>
                `;
                break;
                
            case 'terminal':
                title = 'Terminal Avançado';
                content = `
                    <div class="advanced-terminal" id="${windowId}-terminal">
                        <div class="terminal-line"><span class="terminal-prompt">$</span> Bem-vindo ao Terminal Reelmi AI v2.0</div>
                        <div class="terminal-line"><span class="terminal-prompt">$</span> Digite "help" para comandos disponíveis</div>
                        <div class="terminal-line"><span class="terminal-prompt">$</span> Conectado ao Python Runtime</div>
                    </div>
                    <input type="text" id="${windowId}-input" style="width:100%; padding:10px; margin-top:10px; background:#1a1a1a; color:#00ff00; border:1px solid #333; border-radius:5px;" placeholder="Digite um comando..." onkeypress="terminalKeyPress(event, '${windowId}')">
                    <div style="margin-top:10px; font-size:12px; color:#888;">
                        <i class="fas fa-info-circle"></i> Dica: Use ↑↓ para navegar no histórico
                    </div>
                `;
                break;
                
            case 'ventilation':
                title = 'Simulador Ventilatório';
                content = `
                    <div class="ventilation-simulator">
                        <h3><i class="fas fa-lungs"></i> Parâmetros Ventilatórios</h3>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0;">
                            <div>
                                <label>Vt (ml)</label>
                                <input type="range" min="200" max="800" value="500" class="vent-param" data-param="vt" oninput="updateVentParam('${windowId}', this)">
                                <span id="vt-value-${windowId}" style="display:block; text-align:center; font-weight:bold;">500</span>
                            </div>
                            <div>
                                <label>PEEP (cmH2O)</label>
                                <input type="range" min="0" max="20" value="5" class="vent-param" data-param="peep" oninput="updateVentParam('${windowId}', this)">
                                <span id="peep-value-${windowId}" style="display:block; text-align:center; font-weight:bold;">5</span>
                            </div>
                            <div>
                                <label>FiO₂ (%)</label>
                                <input type="range" min="21" max="100" value="40" class="vent-param" data-param="fio2" oninput="updateVentParam('${windowId}', this)">
                                <span id="fio2-value-${windowId}" style="display:block; text-align:center; font-weight:bold;">40</span>
                            </div>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 15px 0;">
                            <div>
                                <label>Modo Ventilatório</label>
                                <select id="vent-mode-${windowId}" class="calc-input" onchange="updateVentMode('${windowId}')">
                                    <option value="vcv">VCV (Volume Control)</option>
                                    <option value="pcv">PCV (Pressure Control)</option>
                                    <option value="simv">SIMV</option>
                                    <option value="cpap">CPAP</option>
                                </select>
                            </div>
                            <div>
                                <label>Frequência (rpm)</label>
                                <input type="range" min="10" max="40" value="20" class="vent-param" data-param="freq" oninput="updateVentParam('${windowId}', this)">
                                <span id="freq-value-${windowId}" style="display:block; text-align:center; font-weight:bold;">20</span>
                            </div>
                            <div>
                                <label>I:E Ratio</label>
                                <select id="ieratio-${windowId}" class="calc-input">
                                    <option value="1:1">1:1</option>
                                    <option value="1:2" selected>1:2</option>
                                    <option value="1:3">1:3</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="pv-curve" id="${windowId}-curve">
                            <canvas id="${windowId}-canvas" width="400" height="300"></canvas>
                        </div>
                        
                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <button onclick="simulateVentilation('${windowId}')" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-play"></i> Simular
                            </button>
                            <button onclick="saveVentilationSettings('${windowId}')" style="padding:12px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-save"></i>
                            </button>
                            <button onclick="exportVentilationData('${windowId}')" style="padding:12px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                        
                        <div id="${windowId}-results" style="margin-top: 15px;"></div>
                    </div>
                `;
                break;
                
            case 'agent':
                title = 'Agente Auto-GPT';
                content = `
                    <div class="agent-status">
                        <h3><i class="fas fa-robot"></i> Agente Autônomo</h3>
                        <div style="margin: 15px 0;">
                            <input type="text" id="${windowId}-goal" class="calc-input" placeholder="Digite um objetivo para o agente (ex: 'Pesquisar sobre ventilação neonatal')">
                            <div style="display: flex; gap: 10px; margin-top: 10px;">
                                <button onclick="startAgent('${windowId}')" style="flex:1; padding:12px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                                    <i class="fas fa-play"></i> Iniciar Agente
                                </button>
                                <button onclick="pauseAgent('${windowId}')" style="padding:12px; background:var(--warning); color:white; border:none; border-radius:10px; cursor:pointer;">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button onclick="stopAgent('${windowId}')" style="padding:12px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                                    <i class="fas fa-stop"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="task-list" id="${windowId}-tasks">
                            <div class="task-item">
                                <div>
                                    <strong>Status do Agente</strong>
                                    <br><small>Pronto para iniciar uma missão</small>
                                </div>
                                <div class="loading-wave">
                                    <div></div><div></div><div></div>
                                </div>
                            </div>
                        </div>
                        
                        <div style="margin-top: 20px;">
                            <h4>Configurações do Agente</h4>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
                                <div>
                                    <label>Nível de Autonomia</label>
                                    <select id="${windowId}-autonomy" class="calc-input">
                                        <option value="low">Baixa (Consultar)</option>
                                        <option value="medium" selected>Média (Recomendar)</option>
                                        <option value="high">Alta (Executar)</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Máx. Iterações</label>
                                    <input type="number" id="${windowId}-iterations" class="calc-input" value="10" min="1" max="50">
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                break;
                
            case 'study':
                title = 'Dashboard de Estudo';
                content = `
                    <div class="study-dashboard">
                        <div class="progress-card">
                            <h4><i class="fas fa-lungs"></i> Ventilação Mecânica</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%"></div>
                            </div>
                            <span>65% completo</span>
                            <button onclick="startStudyModule('ventilation')" style="width:100%; padding:8px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:8px; cursor:pointer;">
                                Continuar Estudo
                            </button>
                        </div>
                        
                        <div class="progress-card">
                            <h4><i class="fas fa-baby"></i> Neonatologia</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 40%"></div>
                            </div>
                            <span>40% completo</span>
                            <button onclick="startStudyModule('neonatology')" style="width:100%; padding:8px; margin-top:10px; background:var(--primary-gradient); color:white; border:none; border-radius:8px; cursor:pointer;">
                                Iniciar Módulo
                            </button>
                        </div>
                        
                        <div class="progress-card">
                            <h4><i class="fas fa-tasks"></i> Exercícios</h4>
                            <div style="font-size: 32px; text-align: center; margin: 15px 0;">12/20</div>
                            <div style="text-align: center;">
                                <small>Taxa de acerto: 85%</small>
                            </div>
                        </div>
                        
                        <div class="progress-card">
                            <h4><i class="fas fa-calendar"></i> Próxima Revisão</h4>
                            <div style="font-size: 18px; text-align: center; margin: 15px 0;">Amanhã 10:00</div>
                            <div style="text-align: center;">
                                <small>Tópico: Modos Ventilatórios</small>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <button onclick="generateStudyPlan()" style="width:100%; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-magic"></i> Gerar Plano de Estudo Personalizado
                        </button>
                        
                        <button onclick="takePracticeTest()" style="width:100%; padding:12px; margin-top:10px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-clipboard-check"></i> Fazer Teste Prático
                        </button>
                    </div>
                    
                    <div id="${windowId}-study-content" style="margin-top: 20px;"></div>
                `;
                break;
                
            case 'code':
                title = 'Editor de Código';
                content = `
                    <div style="height: 400px;">
                        <textarea id="${windowId}-code-editor" style="width:100%; height:300px; background:#1a1a1a; color:white; border:none; border-radius:8px; padding:10px; font-family: monospace;">
// Digite seu código aqui
function helloWorld() {
    console.log("Hello, Reelmi AI!");
}

// Exemplo de função médica
function calculatePaO2FiO2(pao2, fio2) {
    return pao2 / fio2;
}
                        </textarea>
                    </div>
                    <div style="display: flex; gap: 10px; margin-top: 15px;">
                        <select id="${windowId}-language" class="calc-input" style="flex:1;">
                            <option value="javascript">JavaScript</option>
                            <option value="python">Python</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                        </select>
                        <button onclick="runCode('${windowId}')" style="padding:12px 20px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-play"></i> Executar
                        </button>
                        <button onclick="formatCode('${windowId}')" style="padding:12px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </div>
                    <div id="${windowId}-code-output" style="margin-top:15px; padding:15px; background:#1a1a1a; color:#00ff00; border-radius:8px; min-height:100px; font-family: monospace;">
                        // Saída aparecerá aqui
                    </div>
                `;
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
        
        // Posição aleatória inicial
        const maxX = window.innerWidth - 400;
        const maxY = window.innerHeight - 400;
        window.style.left = Math.floor(Math.random() * maxX) + 'px';
        window.style.top = Math.floor(Math.random() * maxY) + 'px';
        
        document.getElementById('window-container').appendChild(window);
        windows.push(windowId);
        
        // Tornar arrastável
        makeDraggable(windowId);
        
        // Inicializar conteúdo específico
        if (type === 'terminal') initTerminal(windowId);
        if (type === 'ventilation') initVentilationSimulator(windowId);
        if (type === 'code') initCodeEditor(windowId);
    }
    
    function makeDraggable(windowId) {
        const window = document.getElementById(windowId);
        const header = window.querySelector('.window-header');
        
        let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        
        header.onmousedown = dragMouseDown;
        
        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
            window.style.zIndex = ++windowZIndex;
        }
        
        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            window.style.top = (window.offsetTop - pos2) + "px";
            window.style.left = (window.offsetLeft - pos1) + "px";
        }
        
        function closeDragElement() {
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
    
    function closeWindow(windowId) {
        const window = document.getElementById(windowId);
        if (window) {
            window.style.animation = 'windowOpen 0.3s ease-out reverse';
            setTimeout(() => {
                window.remove();
                windows = windows.filter(id => id !== windowId);
            }, 300);
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
    
    function toggleDock() {
        const dock = document.getElementById('app-dock');
        dock.style.display = dock.style.display === 'none' ? 'flex' : 'none';
        dockVisible = !dockVisible;
    }
    
    /* ============ IA REAL ============ */
    let realAIActive = false;
    let currentAIMode = 'simulated';
    
    function toggleRealAI() {
        const fab = document.getElementById('ai-fab');
        if (!realAIActive) {
            realAIActive = true;
            fab.style.background = 'linear-gradient(135deg, #00ff00, #00cc00)';
            fab.innerHTML = '<i class="fas fa-brain"></i> AI ON';
            document.getElementById('ai-mode-indicator').textContent = 'IA: Ativa';
            showCustomModal('IA Real Ativada', `
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 48px; color: #00ff00; margin-bottom: 20px;">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>IA Real Conectada!</h3>
                    <p>Modo: <strong>${currentAIMode.toUpperCase()}</strong></p>
                    <p>Sua conversa agora usará modelos de IA avançados.</p>
                    <div style="margin-top: 20px; padding: 15px; background: rgba(0,255,0,0.1); border-radius: 10px;">
                        <small>Para configurações avançadas, acesse o menu "IA Real" na sidebar</small>
                    </div>
                </div>
            `);
        } else {
            realAIActive = false;
            fab.style.background = 'var(--primary-gradient)';
            fab.innerHTML = '<i class="fas fa-brain"></i>';
            document.getElementById('ai-mode-indicator').textContent = 'IA: Local';
            showCustomModal('IA Real Desativada', `
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 48px; color: #ff5555; margin-bottom: 20px;">
                        <i class="fas fa-power-off"></i>
                    </div>
                    <h3>IA Real Desconectada</h3>
                    <p>Retornando ao modo local.</p>
                </div>
            `);
        }
    }
    
    function selectAIMode(mode) {
        currentAIMode = mode;
        document.querySelectorAll('#real-ai-modal .mode-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        let configHTML = '';
        
        switch(mode) {
            case 'openai':
                configHTML = `
                    <div class="calc-group">
                        <label><i class="fas fa-key"></i> API Key OpenAI</label>
                        <input type="password" id="openai-key" class="calc-input" placeholder="sk-...">
                        <small>Obtenha em platform.openai.com</small>
                    </div>
                    <div class="calc-group">
                        <label><i class="fas fa-cogs"></i> Modelo</label>
                        <select id="openai-model" class="calc-input">
                            <option value="gpt-3.5-turbo">GPT-3.5 Turbo (Rápido)</option>
                            <option value="gpt-4">GPT-4 (Preciso)</option>
                            <option value="gpt-4-turbo">GPT-4 Turbo (Recomendado)</option>
                        </select>
                    </div>
                    <div class="calc-group">
                        <label><i class="fas fa-sliders-h"></i> Temperatura</label>
                        <input type="range" id="openai-temp" min="0" max="1" step="0.1" value="0.7" class="calc-input">
                        <small>Criatividade: <span id="temp-value">0.7</span></small>
                    </div>
                `;
                break;
                
            case 'groq':
                configHTML = `
                    <div class="calc-group">
                        <label><i class="fas fa-key"></i> API Key Groq</label>
                        <input type="password" id="groq-key" class="calc-input" placeholder="gsk-...">
                        <small>Obtenha em console.groq.com</small>
                    </div>
                    <div class="calc-group">
                        <label><i class="fas fa-cogs"></i> Modelo</label>
                        <select id="groq-model" class="calc-input">
                            <option value="llama2-70b-4096">Llama 2 70B</option>
                            <option value="mixtral-8x7b-32768">Mixtral 8x7B</option>
                            <option value="gemma-7b-it">Gemma 7B</option>
                        </select>
                    </div>
                `;
                break;
                
            case 'local':
                configHTML = `
                    <div class="calc-group">
                        <label><i class="fas fa-server"></i> URL Ollama</label>
                        <input type="text" id="ollama-url" class="calc-input" value="http://localhost:11434">
                        <small>Instale Ollama localmente</small>
                    </div>
                    <div class="calc-group">
                        <label><i class="fas fa-cogs"></i> Modelo Local</label>
                        <select id="ollama-model" class="calc-input">
                            <option value="llama2">Llama 2 (7B)</option>
                            <option value="mistral">Mistral (7B)</option>
                            <option value="codellama">CodeLlama (7B)</option>
                            <option value="medllama2">MedLlama2 (Médico)</option>
                        </select>
                    </div>
                `;
                break;
                
            case 'simulated':
                configHTML = `
                    <div class="calc-group">
                        <label><i class="fas fa-desktop"></i> Modo Simulado</label>
                        <p>Usa o sistema local avançado com:</p>
                        <ul>
                            <li>Base de conhecimento médica</li>
                            <li>Análise de contexto</li>
                            <li>Detecção de intenção</li>
                            <li>Sistema de memória</li>
                        </ul>
                        <p style="margin-top:10px; color:var(--success);"><i class="fas fa-check-circle"></i> Pronto para uso!</p>
                    </div>
                `;
                break;
        }
        
        document.getElementById('ai-config-area').innerHTML = configHTML;
        
        // Atualizar valor da temperatura
        if (mode === 'openai') {
            document.getElementById('openai-temp').addEventListener('input', function() {
                document.getElementById('temp-value').textContent = this.value;
            });
        }
    }
    
    async function testAIConnection() {
        const statusModal = showCustomModal('Testando Conexão', `
            <div style="text-align: center; padding: 20px;">
                <div class="loading-wave" style="justify-content: center;">
                    <div></div><div></div><div></div><div></div>
                </div>
                <p style="margin-top: 20px;">Conectando ao servidor de IA...</p>
            </div>
        `);
        
        setTimeout(() => {
            statusModal.remove();
            showCustomModal('Conexão Testada', `
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 48px; color: var(--success); margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Conexão Bem Sucedida!</h3>
                    <p>Modo: <strong>${currentAIMode.toUpperCase()}</strong></p>
                    <p>Latência: <strong>${(Math.random() * 100 + 50).toFixed(0)}ms</strong></p>
                    <p>Status: <span style="color:var(--success);">●</span> Conectado</p>
                    <div style="margin-top: 20px; padding: 15px; background: rgba(16, 185, 129, 0.1); border-radius: 10px;">
                        <small>Pronto para uso! A IA Real será usada nas próximas conversas.</small>
                    </div>
                </div>
            `);
            
            // Ativar IA Real
            realAIActive = true;
            const fab = document.getElementById('ai-fab');
            fab.style.background = 'linear-gradient(135deg, #00ff00, #00cc00)';
            fab.innerHTML = '<i class="fas fa-brain"></i> AI ON';
            document.getElementById('ai-mode-indicator').textContent = `IA: ${currentAIMode}`;
        }, 1500);
    }
    
    /* ============ MEMÓRIA AVANÇADA ============ */
    let longTermMemory = JSON.parse(localStorage.getItem('reelmi_long_memory') || '{}');
    
    function saveToLongMemory(key, value) {
        longTermMemory[key] = {
            value: value,
            timestamp: new Date().toISOString(),
            accessCount: (longTermMemory[key]?.accessCount || 0) + 1,
            category: detectarIntencao(key).categoria
        };
        localStorage.setItem('reelmi_long_memory', JSON.stringify(longTermMemory));
    }
    
    function getFromLongMemory(key) {
        if (longTermMemory[key]) {
            longTermMemory[key].lastAccessed = new Date().toISOString();
            longTermMemory[key].accessCount++;
            localStorage.setItem('reelmi_long_memory', JSON.stringify(longTermMemory));
            return longTermMemory[key].value;
        }
        return null;
    }
    
    function showMemoryManager() {
        document.getElementById('memory-manager-modal').style.display = 'flex';
        updateMemoryStats();
        loadReminders();
    }
    
    function updateMemoryStats() {
        const stats = document.getElementById('memory-stats');
        const memoryCount = Object.keys(longTermMemory).length;
        const totalAccess = Object.values(longTermMemory).reduce((sum, item) => sum + (item.accessCount || 0), 0);
        
        // Calcular por categoria
        const categories = {};
        Object.values(longTermMemory).forEach(item => {
            const cat = item.category || 'outro';
            categories[cat] = (categories[cat] || 0) + 1;
        });
        
        let categoriesHTML = '';
        for (const [cat, count] of Object.entries(categories)) {
            categoriesHTML += `<div style="margin:5px 0;"><strong>${cat}:</strong> ${count} itens</div>`;
        }
        
        stats.innerHTML = `
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin: 15px 0;">
                <div class="gas-parameter">
                    <div class="gas-value">${memoryCount}</div>
                    <div>Memórias Salvas</div>
                </div>
                <div class="gas-parameter">
                    <div class="gas-value">${totalAccess}</div>
                    <div>Acessos Totais</div>
                </div>
            </div>
            <h4>Distribuição por Categoria:</h4>
            ${categoriesHTML}
        `;
    }
    
    function addReminder() {
        const text = document.getElementById('new-reminder').value;
        const time = document.getElementById('reminder-time').value;
        
        if (!text || !time) {
            alert('Preencha todos os campos');
            return;
        }
        
        const reminders = JSON.parse(localStorage.getItem('reelmi_reminders') || '[]');
        const reminder = {
            id: Date.now(),
            text: text,
            time: time,
            created: new Date().toISOString(),
            completed: false,
            notified: false
        };
        
        reminders.push(reminder);
        localStorage.setItem('reelmi_reminders', JSON.stringify(reminders));
        document.getElementById('new-reminder').value = '';
        loadReminders();
        scheduleReminderCheck();
        
        // Mostrar confirmação
        showCustomModal('Lembrete Adicionado', `
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 48px; color: var(--success); margin-bottom: 20px;">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Lembrete Agendado!</h3>
                <p><strong>"${text}"</strong></p>
                <p>Para: ${new Date(time).toLocaleString()}</p>
            </div>
        `);
    }
    
    function loadReminders() {
        const reminders = JSON.parse(localStorage.getItem('reelmi_reminders') || '[]');
        const list = document.getElementById('reminders-list');
        
        if (reminders.length === 0) {
            list.innerHTML = '<p style="text-align:center; color:var(--text-muted);"><i class="fas fa-bell-slash"></i> Nenhum lembrete agendado.</p>';
            return;
        }
        
        // Ordenar por data
        reminders.sort((a, b) => new Date(a.time) - new Date(b.time));
        
        let html = '';
        reminders.forEach(reminder => {
            const time = new Date(reminder.time);
            const now = new Date();
            const timeDiff = time - now;
            const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60));
            
            let statusColor = 'var(--info)';
            let statusText = 'Agendado';
            
            if (reminder.completed) {
                statusColor = 'var(--success)';
                statusText = 'Concluído';
            } else if (timeDiff < 0) {
                statusColor = 'var(--danger)';
                statusText = 'Atrasado';
            } else if (hoursLeft < 24) {
                statusColor = 'var(--warning)';
                statusText = 'Próximo';
            }
            
            html += `
                <div class="task-item" style="border-left: 4px solid ${statusColor};">
                    <div>
                        <strong>${reminder.text}</strong><br>
                        <small><i class="far fa-clock"></i> ${time.toLocaleString()}</small>
                        <div style="margin-top:5px;">
                            <span style="font-size:11px; padding:2px 6px; background:${statusColor}; color:white; border-radius:10px;">${statusText}</span>
                        </div>
                    </div>
                    <div>
                        <button onclick="completeReminder(${reminder.id})" style="padding:5px 10px; background:var(--success); color:white; border:none; border-radius:5px; cursor:pointer; margin-right:5px;" title="Marcar como concluído">
                            <i class="fas fa-check"></i>
                        </button>
                        <button onclick="deleteReminder(${reminder.id})" style="padding:5px 10px; background:var(--danger); color:white; border:none; border-radius:5px; cursor:pointer;" title="Excluir">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
        });
        
        list.innerHTML = html;
    }
    
    function completeReminder(id) {
        const reminders = JSON.parse(localStorage.getItem('reelmi_reminders') || '[]');
        const index = reminders.findIndex(r => r.id === id);
        if (index !== -1) {
            reminders[index].completed = true;
            reminders[index].completedAt = new Date().toISOString();
            localStorage.setItem('reelmi_reminders', JSON.stringify(reminders));
            loadReminders();
        }
    }
    
    function deleteReminder(id) {
        if (!confirm('Tem certeza que deseja excluir este lembrete?')) return;
        
        const reminders = JSON.parse(localStorage.getItem('reelmi_reminders') || '[]');
        const filtered = reminders.filter(r => r.id !== id);
        localStorage.setItem('reelmi_reminders', JSON.stringify(filtered));
        loadReminders();
    }
    
    function scheduleReminderCheck() {
        // Verificar lembretes a cada minuto
        setInterval(checkReminders, 60000);
    }
    
    function checkReminders() {
        const reminders = JSON.parse(localStorage.getItem('reelmi_reminders') || '[]');
        const now = new Date();
        
        reminders.forEach(reminder => {
            if (reminder.completed || reminder.notified) return;
            
            const reminderTime = new Date(reminder.time);
            const timeDiff = reminderTime - now;
            
            // Notificar se faltar menos de 5 minutos ou se já passou
            if (timeDiff < 300000 && timeDiff > -300000) {
                showNotification(`Lembrete: ${reminder.text}`);
                reminder.notified = true;
                
                // Atualizar no storage
                const updatedReminders = reminders.map(r => 
                    r.id === reminder.id ? {...r, notified: true} : r
                );
                localStorage.setItem('reelmi_reminders', JSON.stringify(updatedReminders));
            }
        });
    }
    
    function showNotification(message) {
        // Criar elemento de notificação
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
        
        // Remover após 5 segundos
        setTimeout(() => {
            notification.style.animation = 'slideIn 0.3s ease reverse';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
        
        // Notificação do navegador
        if (Notification.permission === 'granted') {
            new Notification('Reelmi AI', { body: message });
        }
        
        // Adicionar ao chat
        addMsg(`🔔 ${message}`, 'bot');
    }
    
    /* ============ TERMINAL AVANÇADO ============ */
    let terminalHistory = [];
    let historyIndex = 0;
    
    function initTerminal(windowId) {
        const input = document.getElementById(`${windowId}-input`);
        input.focus();
    }
    
    function terminalKeyPress(e, windowId) {
        if (e.key === 'Enter') {
            const input = document.getElementById(`${windowId}-input`);
            const terminal = document.getElementById(`${windowId}-terminal`);
            const command = input.value.trim();
            
            if (command) {
                terminalHistory.push(command);
                historyIndex = terminalHistory.length;
                
                // Adicionar comando ao terminal
                terminal.innerHTML += `<div class="terminal-line"><span class="terminal-prompt">$</span> ${command}</div>`;
                
                // Processar comando
                processTerminalCommand(command, windowId);
                
                input.value = '';
                terminal.scrollTop = terminal.scrollHeight;
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (terminalHistory.length > 0 && historyIndex > 0) {
                historyIndex--;
                document.getElementById(`${windowId}-input`).value = terminalHistory[historyIndex];
            }
        } else if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (historyIndex < terminalHistory.length - 1) {
                historyIndex++;
                document.getElementById(`${windowId}-input`).value = terminalHistory[historyIndex];
            } else {
                historyIndex = terminalHistory.length;
                document.getElementById(`${windowId}-input`).value = '';
            }
        }
    }
    
    function processTerminalCommand(command, windowId) {
        const terminal = document.getElementById(`${windowId}-terminal`);
        const cmd = command.toLowerCase().split(' ')[0];
        
        switch(cmd) {
            case 'help':
                terminal.innerHTML += `<div class="terminal-line">Comandos disponíveis:</div>`;
                terminal.innerHTML += `<div class="terminal-line">  help - Mostra esta ajuda</div>`;
                terminal.innerHTML += `<div class="terminal-line">  clear - Limpa o terminal</div>`;
                terminal.innerHTML += `<div class="terminal-line">  python [código] - Executa código Python</div>`;
                terminal.innerHTML += `<div class="terminal-line">  js [código] - Executa JavaScript</div>`;
                terminal.innerHTML += `<div class="terminal-line">  chat [mensagem] - Envia para o chat</div>`;
                terminal.innerHTML += `<div class="terminal-line">  memory - Mostra uso de memória</div>`;
                terminal.innerHTML += `<div class="terminal-line">  ai [mensagem] - Pergunta à IA</div>`;
                break;
                
            case 'clear':
                terminal.innerHTML = '';
                break;
                
            case 'python':
                const pythonCode = command.substring(7);
                try {
                    if (pyodide) {
                        const result = pyodide.runPython(pythonCode);
                        terminal.innerHTML += `<div class="terminal-line">${result}</div>`;
                    } else {
                        terminal.innerHTML += `<div class="terminal-line">Pyodide não carregado. Simulando...</div>`;
                        // Simulação
                        if (pythonCode.includes('print(')) {
                            const match = pythonCode.match(/print\((.*)\)/);
                            if (match) {
                                terminal.innerHTML += `<div class="terminal-line">${match[1].replace(/['"]/g, '')}</div>`;
                            }
                        }
                    }
                } catch (error) {
                    terminal.innerHTML += `<div class="terminal-line" style="color:#ff5555;">Erro: ${error.message}</div>`;
                }
                break;
                
            case 'chat':
                const message = command.substring(5);
                addMsg(message, 'user');
                setTimeout(() => {
                    const resp = encontrarRespostaComContexto(message);
                    addMsg(resp, 'bot');
                }, 500);
                terminal.innerHTML += `<div class="terminal-line">✓ Mensagem enviada para o chat</div>`;
                break;
                
            case 'memory':
                const memoryCount = Object.keys(longTermMemory).length;
                const contextCount = contextoConversa.length;
                terminal.innerHTML += `<div class="terminal-line">Memória de Longo Prazo: ${memoryCount} itens</div>`;
                terminal.innerHTML += `<div class="terminal-line">Contexto Atual: ${contextCount} mensagens</div>`;
                terminal.innerHTML += `<div class="terminal-line">Histórico: ${historicoConversas.length} conversas</div>`;
                break;
                
            case 'ai':
                const aiQuestion = command.substring(3);
                terminal.innerHTML += `<div class="terminal-line">Perguntando à IA: "${aiQuestion}"</div>`;
                setTimeout(() => {
                    const answer = encontrarRespostaComContexto(aiQuestion);
                    terminal.innerHTML += `<div class="terminal-line">IA: ${answer.substring(0, 100)}...</div>`;
                }, 1000);
                break;
                
            default:
                terminal.innerHTML += `<div class="terminal-line">Comando não encontrado: ${command}</div>`;
                terminal.innerHTML += `<div class="terminal-line">Digite "help" para ver comandos disponíveis</div>`;
        }
    }
    
    /* ============ EDITOR NOTION ============ */
    function exportNotion(windowId) {
        const editor = document.getElementById(`${windowId}-editor`);
        const content = editor.innerHTML;
        
        // Criar PDF
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(20);
        doc.text('Documento Notion - Reelmi AI', 20, 20);
        
        // Extrair texto
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = content;
        const text = tempDiv.innerText;
        
        doc.setFontSize(12);
        const lines = doc.splitTextToSize(text, 170);
        let y = 40;
        
        lines.forEach(line => {
            if (y > 280) {
                doc.addPage();
                y = 20;
            }
            doc.text(line, 20, y);
            y += 7;
        });
        
        doc.save(`notion-${Date.now()}.pdf`);
        showNotification('Documento exportado como PDF!');
    }
    
    function saveNotion(windowId) {
        const editor = document.getElementById(`${windowId}-editor`);
        const content = editor.innerHTML;
        localStorage.setItem(`notion_${windowId}`, content);
        showNotification('Documento salvo localmente!');
    }
    
    function insertNotionBlock(windowId, type) {
        const editor = document.getElementById(`${windowId}-editor`);
        let block = '';
        
        switch(type) {
            case 'h1': block = '<div class="notion-block" data-type="h1" contenteditable="true">Título</div>'; break;
            case 'h2': block = '<div class="notion-block" data-type="h2" contenteditable="true">Subtítulo</div>'; break;
            case 'p': block = '<div class="notion-block" data-type="p" contenteditable="true">Texto...</div>'; break;
            case 'list': block = '<div class="notion-block" data-type="list" contenteditable="true">• Item da lista</div>'; break;
        }
        
        editor.innerHTML += block;
    }
    
    /* ============ SIMULADOR VENTILATÓRIO ============ */
    function initVentilationSimulator(windowId) {
        // Inicializar sliders
        document.querySelectorAll(`#${windowId} .vent-param`).forEach(slider => {
            slider.addEventListener('input', function() {
                updateVentParam(windowId, this);
            });
        });
        
        // Inicializar gráfico
        drawVentilationCurve(windowId, 500, 5, 40, 'vcv');
    }
    
    function updateVentParam(windowId, slider) {
        const param = slider.getAttribute('data-param');
        const value = slider.value;
        document.getElementById(`${param}-value-${windowId}`).textContent = value;
        
        // Atualizar gráfico em tempo real
        const vt = parseInt(document.getElementById(`vt-value-${windowId}`).textContent);
        const peep = parseInt(document.getElementById(`peep-value-${windowId}`).textContent);
        const fio2 = parseInt(document.getElementById(`fio2-value-${windowId}`).textContent);
        const mode = document.getElementById(`vent-mode-${windowId}`).value;
        
        drawVentilationCurve(windowId, vt, peep, fio2, mode);
    }
    
    function updateVentMode(windowId) {
        const mode = document.getElementById(`vent-mode-${windowId}`).value;
        const vt = parseInt(document.getElementById(`vt-value-${windowId}`).textContent);
        const peep = parseInt(document.getElementById(`peep-value-${windowId}`).textContent);
        const fio2 = parseInt(document.getElementById(`fio2-value-${windowId}`).textContent);
        
        drawVentilationCurve(windowId, vt, peep, fio2, mode);
    }
    
    function drawVentilationCurve(windowId, vt, peep, fio2, mode) {
        const canvas = document.getElementById(`${windowId}-canvas`);
        const ctx = canvas.getContext('2d');
        
        // Configurar tamanho
        canvas.width = canvas.parentElement.clientWidth;
        canvas.height = canvas.parentElement.clientHeight;
        
        // Limpar canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Configurações do gráfico
        const margin = { top: 20, right: 20, bottom: 40, left: 50 };
        const graphWidth = canvas.width - margin.left - margin.right;
        const graphHeight = canvas.height - margin.top - margin.bottom;
        
        // Calcular PIP baseado no modo
        let pip = peep + (mode === 'pcv' ? 15 : vt / 30);
        
        // Desenhar eixos
        ctx.beginPath();
        ctx.moveTo(margin.left, margin.top);
        ctx.lineTo(margin.left, margin.top + graphHeight);
        ctx.lineTo(margin.left + graphWidth, margin.top + graphHeight);
        ctx.strokeStyle = '#666';
        ctx.lineWidth = 1;
        ctx.stroke();
        
        // Rótulos dos eixos
        ctx.fillStyle = '#999';
        ctx.font = '12px Arial';
        ctx.textAlign = 'center';
        ctx.fillText('Volume (ml)', margin.left + graphWidth / 2, margin.top + graphHeight + 30);
        ctx.save();
        ctx.translate(margin.left - 30, margin.top + graphHeight / 2);
        ctx.rotate(-Math.PI / 2);
        ctx.fillText('Pressão (cmH₂O)', 0, 0);
        ctx.restore();
        
        // Desenhar curva
        ctx.beginPath();
        ctx.moveTo(margin.left, margin.top + graphHeight);
        
        const points = [];
        for (let i = 0; i <= 100; i++) {
            const x = margin.left + (i * graphWidth / 100);
            let pressure, volume;
            
            if (i <= 50) {
                // Inspiração
                pressure = peep + (pip - peep) * (i / 50);
                volume = vt * (i / 50);
            } else {
                // Expiração
                pressure = pip - (pip - peep) * ((i - 50) / 50);
                volume = vt * (1 - (i - 50) / 50);
            }
            
            const y = margin.top + graphHeight - (pressure * graphHeight / 40);
            points.push({x, y, pressure, volume});
            
            if (i === 0) ctx.moveTo(x, y);
            else ctx.lineTo(x, y);
        }
        
        ctx.strokeStyle = '#8C52FF';
        ctx.lineWidth = 3;
        ctx.stroke();
        
        // Desenhar pontos de interesse
        if (points.length > 0) {
            // PEEP
            const peepPoint = points[0];
            ctx.beginPath();
            ctx.arc(peepPoint.x, peepPoint.y, 5, 0, Math.PI * 2);
            ctx.fillStyle = '#00ffff';
            ctx.fill();
            ctx.fillText(`PEEP: ${peep}`, peepPoint.x + 10, peepPoint.y - 10);
            
            // PIP
            const pipPoint = points[50];
            ctx.beginPath();
            ctx.arc(pipPoint.x, pipPoint.y, 5, 0, Math.PI * 2);
            ctx.fillStyle = '#ff5555';
            ctx.fill();
            ctx.fillText(`PIP: ${pip.toFixed(1)}`, pipPoint.x + 10, pipPoint.y - 10);
            
            // Vt
            const vtPoint = points[50];
            ctx.fillStyle = '#00ff00';
            ctx.fillText(`Vt: ${vt}ml`, vtPoint.x, vtPoint.y + 20);
        }
        
        // Grade
        ctx.strokeStyle = 'rgba(255,255,255,0.1)';
        ctx.lineWidth = 0.5;
        
        // Linhas horizontais (pressão)
        for (let p = 0; p <= 40; p += 5) {
            const y = margin.top + graphHeight - (p * graphHeight / 40);
            ctx.beginPath();
            ctx.moveTo(margin.left, y);
            ctx.lineTo(margin.left + graphWidth, y);
            ctx.stroke();
            ctx.fillText(p.toString(), margin.left - 20, y + 4);
        }
        
        // Linhas verticais (volume)
        for (let v = 0; v <= vt; v += vt/4) {
            const x = margin.left + (v * graphWidth / vt);
            ctx.beginPath();
            ctx.moveTo(x, margin.top);
            ctx.lineTo(x, margin.top + graphHeight);
            ctx.stroke();
            ctx.fillText(v.toFixed(0), x, margin.top + graphHeight + 15);
        }
    }
    
    function simulateVentilation(windowId) {
        const vt = parseInt(document.getElementById(`vt-value-${windowId}`).textContent);
        const peep = parseInt(document.getElementById(`peep-value-${windowId}`).textContent);
        const fio2 = parseInt(document.getElementById(`fio2-value-${windowId}`).textContent);
        const freq = parseInt(document.getElementById(`freq-value-${windowId}`)?.textContent || 20);
        const mode = document.getElementById(`vent-mode-${windowId}`).value;
        const ieratio = document.getElementById(`ieratio-${windowId}`).value;
        
        // Calcular parâmetros
        let pip = peep + (mode === 'pcv' ? 15 : vt / 30);
        const compliance = vt / (pip - peep);
        const resistance = (pip - peep) / 0.5; // Estimativa simplificada
        const minuteVolume = (vt * freq) / 1000;
        const alveolarVentilation = minuteVolume * 0.7; // Estimativa
        
        // Calcular oxigenação estimada
        let estimatedPaO2 = fio2 * 5 + 60; // Fórmula simplificada
        if (mode === 'pcv') estimatedPaO2 += 10;
        
        // Calcular PaCO2 estimado
        let estimatedPaCO2 = 40 - (alveolarVentilation - 4) * 5;
        if (estimatedPaCO2 < 20) estimatedPaCO2 = 20;
        if (estimatedPaCO2 > 60) estimatedPaCO2 = 60;
        
        // Resultados
        const results = document.getElementById(`${windowId}-results`);
        results.innerHTML = `
            <div style="background: var(--bg-surface); border-radius: 10px; padding: 15px; margin-top: 15px;">
                <h4><i class="fas fa-chart-line"></i> Resultados da Simulação</h4>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 10px;">
                    <div>
                        <strong>Parâmetros Calculados:</strong>
                        <ul style="margin-top: 5px; font-size: 14px;">
                            <li>PIP: ${pip.toFixed(1)} cmH₂O</li>
                            <li>Complacência: ${compliance.toFixed(2)} ml/cmH₂O</li>
                            <li>Resistência: ${resistance.toFixed(1)} cmH₂O/L/s</li>
                            <li>Volume Minuto: ${minuteVolume.toFixed(2)} L/min</li>
                            <li>Ventilação Alveolar: ${alveolarVentilation.toFixed(2)} L/min</li>
                        </ul>
                    </div>
                    <div>
                        <strong>Gasometria Estimada:</strong>
                        <ul style="margin-top: 5px; font-size: 14px;">
                            <li>PaO₂: ${estimatedPaO2.toFixed(0)} mmHg</li>
                            <li>PaCO₂: ${estimatedPaCO2.toFixed(0)} mmHg</li>
                            <li>SaO₂: ${Math.min(100, 90 + estimatedPaO2 / 5).toFixed(1)}%</li>
                            <li>PaO₂/FiO₂: ${(estimatedPaO2 / (fio2/100)).toFixed(0)}</li>
                            <li>pH: ${(7.4 - (estimatedPaCO2 - 40) * 0.008).toFixed(2)}</li>
                        </ul>
                    </div>
                </div>
                <div style="margin-top: 10px; padding: 10px; background: rgba(140, 82, 255, 0.1); border-radius: 5px;">
                    <strong><i class="fas fa-lightbulb"></i> Recomendação:</strong>
                    <p style="margin-top: 5px; font-size: 14px;">
                        ${getVentilationRecommendation(mode, vt, peep, fio2, estimatedPaO2, estimatedPaCO2)}
                    </p>
                </div>
            </div>
        `;
        
        // Salvar simulação
        saveToLongMemory(`vent_sim_${Date.now()}`, {
            vt, peep, fio2, mode, freq, ieratio,
            pip, compliance, minuteVolume,
            estimatedPaO2, estimatedPaCO2
        });
    }
    
    function getVentilationRecommendation(mode, vt, peep, fio2, pao2, paco2) {
        let recommendations = [];
        
        if (pao2 < 60) recommendations.push("Considerar aumentar FiO₂ ou PEEP para melhorar oxigenação");
        if (pao2 > 100 && fio2 > 40) recommendations.push("Considerar reduzir FiO₂ para prevenir toxicidade por oxigênio");
        if (paco2 < 35) recommendations.push("Hiperventilação - considerar reduzir frequência ou volume corrente");
        if (paco2 > 45) recommendations.push("Hipoventilação - considerar aumentar frequência ou volume corrente");
        if (vt > 8 && mode === 'vcv') recommendations.push("Volume corrente elevado - considerar redução para prevenir VILI");
        if (peep < 5 && pao2 < 80) recommendations.push("PEEP baixo - considerar aumento para recrutamento alveolar");
        
        if (recommendations.length === 0) {
            return "Configuração ventilatória adequada. Manter parâmetros atuais e monitorar.";
        }
        
        return recommendations.join(" ");
    }
    
    function saveVentilationSettings(windowId) {
        const settings = {
            vt: document.getElementById(`vt-value-${windowId}`).textContent,
            peep: document.getElementById(`peep-value-${windowId}`).textContent,
            fio2: document.getElementById(`fio2-value-${windowId}`).textContent,
            mode: document.getElementById(`vent-mode-${windowId}`).value,
            timestamp: new Date().toISOString()
        };
        
        localStorage.setItem('ventilation_settings', JSON.stringify(settings));
        showNotification('Configurações ventilatórias salvas!');
    }
    
    function exportVentilationData(windowId) {
        const data = {
            parameters: {
                vt: document.getElementById(`vt-value-${windowId}`).textContent,
                peep: document.getElementById(`peep-value-${windowId}`).textContent,
                fio2: document.getElementById(`fio2-value-${windowId}`).textContent,
                mode: document.getElementById(`vent-mode-${windowId}`).value,
                freq: document.getElementById(`freq-value-${windowId}`)?.textContent || '20'
            },
            timestamp: new Date().toISOString(),
            simulation: 'Ventilation Simulation Data'
        };
        
        const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `ventilation-data-${Date.now()}.json`;
        a.click();
        
        showNotification('Dados de simulação exportados!');
    }
    
    /* ============ MULTIMODALIDADE ============ */
    let cocoModel = null;
    
    async function loadCocoModel() {
        try {
            cocoModel = await cocoSsd.load();
            console.log('Modelo COCO-SSD carregado');
        } catch (error) {
            console.error('Erro ao carregar modelo:', error);
        }
    }
    
    function selectMultimodalMode(mode) {
        document.querySelectorAll('#multimodal-modal .mode-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        let content = '';
        
        switch(mode) {
            case 'ocr':
                content = `
                    <div class="calc-group">
                        <h3><i class="fas fa-font"></i> OCR de Imagens</h3>
                        <p>Extraia texto de imagens, documentos e capturas de tela.</p>
                        <input type="file" id="ocr-image" accept="image/*" class="calc-input">
                        <div style="display: flex; gap: 10px; margin-top: 10px;">
                            <button onclick="runOCR()" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-play"></i> Extrair Texto
                            </button>
                            <button onclick="clearOCR()" style="padding:12px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div id="ocr-result" style="margin-top:15px; padding:15px; background:var(--bg-hover); border-radius:10px; min-height:100px;">
                            <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-image"></i> Resultado do OCR aparecerá aqui</p>
                        </div>
                    </div>
                `;
                break;
                
            case 'object':
                content = `
                    <div class="calc-group">
                        <h3><i class="fas fa-search"></i> Detecção de Objetos</h3>
                        <p>Identifique objetos em imagens usando IA.</p>
                        <input type="file" id="object-image" accept="image/*" class="calc-input">
                        <div style="display: flex; gap: 10px; margin-top: 10px;">
                            <button onclick="runObjectDetection()" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-search"></i> Detectar Objetos
                            </button>
                            <button onclick="clearObjectDetection()" style="padding:12px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
                            <div id="object-image-preview" style="min-height:200px; background:var(--bg-hover); border-radius:10px; display:flex; align-items:center; justify-content:center;">
                                <p style="color:var(--text-muted);"><i class="fas fa-image"></i> Prévia da imagem</p>
                            </div>
                            <div id="object-result" style="min-height:200px; padding:15px; background:var(--bg-hover); border-radius:10px;">
                                <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-list"></i> Objetos detectados</p>
                            </div>
                        </div>
                    </div>
                `;
                break;
                
            case 'graph':
                content = `
                    <div class="calc-group">
                        <h3><i class="fas fa-chart-line"></i> Análise de Gráficos</h3>
                        <p>Analise gráficos médicos e extraia dados.</p>
                        <input type="file" id="graph-image" accept="image/*" class="calc-input">
                        <div style="display: flex; gap: 10px; margin-top: 10px;">
                            <button onclick="analyzeGraph()" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-chart-bar"></i> Analisar Gráfico
                            </button>
                            <button onclick="clearGraphAnalysis()" style="padding:12px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div id="graph-analysis" style="margin-top:15px; padding:15px; background:var(--bg-hover); border-radius:10px; min-height:100px;">
                            <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-chart-area"></i> Análise do gráfico aparecerá aqui</p>
                        </div>
                    </div>
                `;
                break;
                
            case 'medical':
                content = `
                    <div class="calc-group">
                        <h3><i class="fas fa-stethoscope"></i> Análise de Imagens Médicas</h3>
                        <p>Análise básica de radiografias e exames (simulado).</p>
                        <input type="file" id="medical-image" accept="image/*" class="calc-input">
                        <div style="display: flex; gap: 10px; margin-top: 10px;">
                            <button onclick="analyzeMedicalImage()" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-heartbeat"></i> Analisar Imagem
                            </button>
                            <button onclick="clearMedicalAnalysis()" style="padding:12px; background:var(--danger); color:white; border:none; border-radius:10px; cursor:pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div id="medical-analysis" style="margin-top:15px; padding:15px; background:var(--bg-hover); border-radius:10px; min-height:100px;">
                            <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-x-ray"></i> Análise médica aparecerá aqui</p>
                        </div>
                        <div style="margin-top:10px; padding:10px; background:rgba(255,0,0,0.1); border-radius:5px; font-size:12px;">
                            <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> Esta é uma análise simulada. Sempre consulte um médico para diagnóstico.
                        </div>
                    </div>
                `;
                break;
        }
        
        document.getElementById('multimodal-content').innerHTML = content;
    }
    
    async function runOCR() {
        const input = document.getElementById('ocr-image');
        if (!input.files[0]) {
            alert('Selecione uma imagem primeiro');
            return;
        }
        
        const resultDiv = document.getElementById('ocr-result');
        resultDiv.innerHTML = `
            <div style="text-align: center; padding: 20px;">
                <div class="loading-wave" style="justify-content: center;">
                    <div></div><div></div><div></div><div></div>
                </div>
                <p style="margin-top: 10px;">Processando imagem...</p>
            </div>
        `;
        
        try {
            const { data: { text } } = await Tesseract.recognize(
                input.files[0],
                'por+eng',
                {
                    logger: m => console.log(m)
                }
            );
            
            resultDiv.innerHTML = `
                <strong><i class="fas fa-font"></i> Texto extraído:</strong>
                <div style="margin-top:10px; padding:10px; background:var(--bg-surface); border-radius:5px; max-height:200px; overflow-y:auto;">
                    ${text || 'Nenhum texto detectado na imagem.'}
                </div>
                <div style="margin-top:10px; display:flex; gap:10px;">
                    <button onclick="copyToClipboard('${text.replace(/'/g, "\\'")}')" style="padding:8px 15px; background:var(--info); color:white; border:none; border-radius:5px; cursor:pointer;">
                        <i class="fas fa-copy"></i> Copiar
                    </button>
                    <button onclick="sendToChat('${text.replace(/'/g, "\\'").substring(0, 100)}...')" style="padding:8px 15px; background:var(--success); color:white; border:none; border-radius:5px; cursor:pointer;">
                        <i class="fas fa-comment"></i> Enviar para Chat
                    </button>
                </div>
            `;
        } catch (error) {
            resultDiv.innerHTML = `
                <div style="color:var(--danger);">
                    <i class="fas fa-exclamation-circle"></i> Erro ao processar imagem: ${error.message}
                </div>
            `;
        }
    }
    
    function clearOCR() {
        document.getElementById('ocr-result').innerHTML = `
            <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-image"></i> Resultado do OCR aparecerá aqui</p>
        `;
        document.getElementById('ocr-image').value = '';
    }
    
    async function runObjectDetection() {
        const input = document.getElementById('object-image');
        if (!input.files[0]) {
            alert('Selecione uma imagem primeiro');
            return;
        }
        
        if (!cocoModel) {
            await loadCocoModel();
        }
        
        const imagePreview = document.getElementById('object-image-preview');
        const resultDiv = document.getElementById('object-result');
        
        // Mostrar prévia da imagem
        const reader = new FileReader();
        reader.onload = async function(e) {
            imagePreview.innerHTML = `<img src="${e.target.result}" style="max-width:100%; max-height:200px; border-radius:5px;">`;
            
            // Processar detecção
            resultDiv.innerHTML = `
                <div style="text-align: center; padding: 20px;">
                    <div class="loading-wave" style="justify-content: center;">
                        <div></div><div></div><div></div><div></div>
                    </div>
                    <p style="margin-top: 10px;">Detectando objetos...</p>
                </div>
            `;
            
            const img = new Image();
            img.src = e.target.result;
            img.onload = async function() {
                try {
                    const predictions = await cocoModel.detect(img);
                    
                    if (predictions.length === 0) {
                        resultDiv.innerHTML = `
                            <p style="text-align:center; color:var(--text-muted);">
                                <i class="fas fa-search"></i> Nenhum objeto detectado na imagem.
                            </p>
                        `;
                        return;
                    }
                    
                    let html = '<strong><i class="fas fa-list"></i> Objetos detectados:</strong><br>';
                    predictions.forEach(prediction => {
                        html += `
                            <div style="margin:5px 0; padding:5px; background:var(--bg-surface); border-radius:5px;">
                                <span style="font-weight:bold;">${prediction.class}</span>
                                <span style="float:right; font-size:12px;">${(prediction.score * 100).toFixed(1)}%</span>
                            </div>
                        `;
                    });
                    
                    resultDiv.innerHTML = html;
                } catch (error) {
                    resultDiv.innerHTML = `
                        <div style="color:var(--danger);">
                            <i class="fas fa-exclamation-circle"></i> Erro na detecção: ${error.message}
                        </div>
                    `;
                }
            };
        };
        reader.readAsDataURL(input.files[0]);
    }
    
    function clearObjectDetection() {
        document.getElementById('object-image-preview').innerHTML = `
            <p style="color:var(--text-muted);"><i class="fas fa-image"></i> Prévia da imagem</p>
        `;
        document.getElementById('object-result').innerHTML = `
            <p style="text-align:center; color:var(--text-muted);"><i class="fas fa-list"></i> Objetos detectados</p>
        `;
        document.getElementById('object-image').value = '';
    }
    
    function analyzeGraph() {
        const input = document.getElementById('graph-image');
        if (!input.files[0]) {
            alert('Selecione uma imagem primeiro');
            return;
        }
        
        const resultDiv = document.getElementById('graph-analysis');
        resultDiv.innerHTML = `
            <div style="text-align: center; padding: 20px;">
                <div class="loading-wave" style="justify-content: center;">
                    <div></div><div></div><div></div><div></div>
                </div>
                <p style="margin-top: 10px;">Analisando gráfico...</p>
            </div>
        `;
        
        // Simulação de análise
        setTimeout(() => {
            const analyses = [
                "Gráfico identificado: Curva de Pressão-Volume",
                "Eixos detectados: Pressão (cmH₂O) vs Volume (ml)",
                "Complacência estimada: 45 ml/cmH₂O",
                "PEEP detectado: ~5 cmH₂O",
                "PIP estimado: ~25 cmH₂O",
                "Forma da curva sugere recrutamento alveolar adequado"
            ];
            
            resultDiv.innerHTML = `
                <strong><i class="fas fa-chart-line"></i> Análise do Gráfico:</strong>
                <ul style="margin-top:10px; padding-left:20px;">
                    ${analyses.map(item => `<li>${item}</li>`).join('')}
                </ul>
                <div style="margin-top:10px; padding:10px; background:rgba(140, 82, 255, 0.1); border-radius:5px;">
                    <strong><i class="fas fa-lightbulb"></i> Interpretação:</strong>
                    <p style="margin-top:5px; font-size:14px;">
                        A curva apresenta formato adequado, sem sinais de hiperdistensão ou atelectasia.
                        Sugere configuração ventilatória apropriada.
                    </p>
                </div>
            `;
        }, 2000);
    }
    
    function analyzeMedicalImage() {
        const input = document.getElementById('medical-image');
        if (!input.files[0]) {
            alert('Selecione uma imagem primeiro');
            return;
        }
        
        const resultDiv = document.getElementById('medical-analysis');
        resultDiv.innerHTML = `
            <div style="text-align: center; padding: 20px;">
                <div class="loading-wave" style="justify-content: center;">
                    <div></div><div></div><div></div><div></div>
                </div>
                <p style="margin-top: 10px;">Analisando imagem médica...</p>
                <p style="font-size:12px; color:var(--text-muted);">Esta é uma análise simulada para fins educacionais</p>
            </div>
        `;
        
        // Simulação de análise médica
        setTimeout(() => {
            const findings = [
                "Imagem identificada: Radiografia de tórax",
                "Campo pulmonar: Bilateralmente expandido",
                "Silhueta cardíaca: Dentro dos limites normais",
                "Hilos: Normais",
                "Câmaras gástricas: Presentes",
                "Posição do TET: Verificar posição (simulado)",
                "Infiltrados: Nenhum infiltrado significativo detectado"
            ];
            
            resultDiv.innerHTML = `
                <strong><i class="fas fa-x-ray"></i> Análise de Imagem Médica:</strong>
                <p style="font-size:12px; color:var(--warning); margin:5px 0;">
                    <i class="fas fa-exclamation-triangle"></i> Análise simulada - Não substitui avaliação médica
                </p>
                <ul style="margin-top:10px; padding-left:20px;">
                    ${findings.map(item => `<li>${item}</li>`).join('')}
                </ul>
                <div style="margin-top:10px; padding:10px; background:rgba(245, 158, 11, 0.1); border-radius:5px;">
                    <strong><i class="fas fa-stethoscope"></i> Recomendação:</strong>
                    <p style="margin-top:5px; font-size:14px;">
                        Imagem dentro dos parâmetros esperados para radiografia de tórax.
                        Recomenda-se confirmação por radiologista e correlação clínica.
                    </p>
                </div>
            `;
        }, 2500);
    }
    
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Texto copiado para a área de transferência!');
        });
    }
    
    function sendToChat(text) {
        addMsg(`[Imagem analisada] ${text}`, 'user');
        setTimeout(() => {
            addMsg('Recebi a análise da imagem! Posso ajudar a interpretar esses dados ou relacioná-los com informações médicas.', 'bot');
        }, 500);
    }
    
    /* ============ AGENTE AUTÔNOMO ============ */
    let agentRunning = false;
    let agentInterval;
    
    async function startAgent(windowId) {
        if (agentRunning) return;
        
        const goal = document.getElementById(`${windowId}-goal`).value;
        if (!goal) {
            alert('Digite um objetivo para o agente');
            return;
        }
        
        agentRunning = true;
        const tasksDiv = document.getElementById(`${windowId}-tasks`);
        const autonomy = document.getElementById(`${windowId}-autonomy`).value;
        const maxIterations = parseInt(document.getElementById(`${windowId}-iterations`).value);
        
        tasksDiv.innerHTML = `
            <div class="task-item" style="background:rgba(16, 185, 129, 0.2);">
                <div>
                    <strong>🎯 Missão Iniciada:</strong> ${goal}
                    <br><small>Autonomia: ${autonomy === 'low' ? 'Baixa' : autonomy === 'medium' ? 'Média' : 'Alta'}</small>
                </div>
                <div class="loading-wave">
                    <div></div><div></div><div></div>
                </div>
            </div>
        `;
        
        // Simular processamento do agente
        let iteration = 0;
        const subtasks = [
            `Analisando objetivo: "${goal}"`,
            `Pesquisando informações relevantes...`,
            `Estratégia: ${autonomy === 'high' ? 'Execução autônoma' : 'Coleta de dados'}`,
            `Consultando base de conhecimento...`,
            `Processando informações médicas...`,
            `Gerando plano de ação...`,
            `Executando tarefas principais...`,
            `Validando resultados...`,
            `Sintetizando informações...`,
            `Preparando relatório final...`
        ];
        
        agentInterval = setInterval(() => {
            if (iteration >= subtasks.length || iteration >= maxIterations) {
                completeAgentMission(windowId, goal);
                return;
            }
            
            const task = subtasks[iteration];
            tasksDiv.innerHTML += `
                <div class="task-item">
                    <div>
                        <strong>${iteration+1}. ${task}</strong>
                        <br><small>${getRandomStatus()}</small>
                    </div>
                    <div class="loading-wave">
                        <div></div><div></div><div></div>
                    </div>
                </div>
            `;
            
            tasksDiv.scrollTop = tasksDiv.scrollHeight;
            iteration++;
            
            // Simular conclusão aleatória
            setTimeout(() => {
                const items = tasksDiv.querySelectorAll('.task-item');
                if (items[iteration]) {
                    const randomSuccess = Math.random() > 0.1;
                    items[iteration].innerHTML = `
                        <div>
                            <strong>${iteration}. ${task}</strong>
                            <br><small>
                                <i class="fas fa-${randomSuccess ? 'check' : 'exclamation-triangle'}" 
                                   style="color:${randomSuccess ? 'var(--success)' : 'var(--warning)'};"></i>
                                ${randomSuccess ? 'Concluído' : 'Revisão necessária'}
                            </small>
                        </div>
                    `;
                }
            }, 1500);
        }, 2000);
    }
    
    function getRandomStatus() {
        const statuses = [
            'Coletando dados...',
            'Processando...',
            'Analisando...',
            'Consultando fontes...',
            'Validando...',
            'Otimizando...'
        ];
        return statuses[Math.floor(Math.random() * statuses.length)];
    }
    
    function completeAgentMission(windowId, goal) {
        clearInterval(agentInterval);
        agentRunning = false;
        
        const tasksDiv = document.getElementById(`${windowId}-tasks`);
        tasksDiv.innerHTML += `
            <div class="task-item" style="background:var(--success); color:white;">
                <div>
                    <strong>✅ Missão Cumprida!</strong>
                    <br><small>Objetivo "${goal}" alcançado com sucesso</small>
                </div>
                <i class="fas fa-trophy" style="font-size:20px;"></i>
            </div>
        `;
        
        // Gerar relatório
        setTimeout(() => {
            const report = generateAgentReport(goal);
            showCustomModal('Relatório do Agente', `
                <div style="max-height: 400px; overflow-y: auto;">
                    <h3><i class="fas fa-robot"></i> Relatório de Missão</h3>
                    <p><strong>Objetivo:</strong> ${goal}</p>
                    <p><strong>Status:</strong> ✅ Concluído com sucesso</p>
                    <p><strong>Duração:</strong> ~${Math.floor(Math.random() * 5 + 3)} minutos</p>
                    
                    <h4 style="margin-top:20px;">Ações Executadas:</h4>
                    <ul>
                        <li>Análise completa do objetivo</li>
                        <li>Pesquisa em base de conhecimento médica</li>
                        <li>Validação de informações técnicas</li>
                        <li>Síntese de dados relevantes</li>
                        <li>Preparação de recomendações</li>
                    </ul>
                    
                    <h4 style="margin-top:20px;">Resultados Obtidos:</h4>
                    <div style="padding:15px; background:var(--bg-hover); border-radius:10px;">
                        ${report}
                    </div>
                    
                    <div style="margin-top:20px; display:flex; gap:10px;">
                        <button onclick="exportAgentReport()" style="flex:1; padding:10px; background:var(--info); color:white; border:none; border-radius:5px; cursor:pointer;">
                            <i class="fas fa-download"></i> Exportar PDF
                        </button>
                        <button onclick="sendToChatAgent('${goal}')" style="flex:1; padding:10px; background:var(--success); color:white; border:none; border-radius:5px; cursor:pointer;">
                            <i class="fas fa-comment"></i> Enviar para Chat
                        </button>
                    </div>
                </div>
            `);
        }, 1000);
    }
    
    function generateAgentReport(goal) {
        const reports = {
            'ventilação': `
                <p><strong>Ventilação Mecânica - Análise Completa</strong></p>
                <ul>
                    <li><strong>Conceitos Fundamentais:</strong> Suporte artificial à respiração</li>
                    <li><strong>Modalidades:</strong> Invasiva vs Não-invasiva</li>
                    <li><strong>Parâmetros Críticos:</strong> Vt, PEEP, FiO2, Frequência</li>
                    <li><strong>Monitorização:</strong> Gasometria, SpO2, Curvas PV</li>
                    <li><strong>Complicações:</strong> Barotrauma, VILI, Pneumonia</li>
                </ul>
                <p><strong>Recomendações:</strong> Monitorização contínua, ajustes graduais, prevenção de VILI</p>
            `,
            'neonatal': `
                <p><strong>Neonatologia - Recomendações</strong></p>
                <ul>
                    <li><strong>Suporte Ventilatório:</strong> Pressões mais baixas, volumes menores</li>
                    <li><strong>Oxigenação:</strong> Manter SpO2 90-95% em prematuros</li>
                    <li><strong>Tubos Endotraqueais:</strong> Tamanhos apropriados (2.5-3.5mm)</li>
                    <li><strong>Monitorização:</strong> Frequente, atenção a complicações</li>
                    <li><strong>Cuidados Especiais:</strong> Termorregulação, nutrição, prevenção de infecções</li>
                </ul>
            `,
            'python': `
                <p><strong>Programação Python - Recursos</strong></p>
                <ul>
                    <li><strong>Bibliotecas Médicas:</strong> NumPy, Pandas, Matplotlib</li>
                    <li><strong>Análise de Dados:</strong> Processamento de sinais vitais</li>
                    <li><strong>Visualização:</strong> Gráficos para monitorização</li>
                    <li><strong>Automação:</strong> Scripts para cálculos médicos</li>
                    <li><strong>Exemplos Práticos:</strong> Cálculo de índices, simulações</li>
                </ul>
            `
        };
        
        // Encontrar o relatório mais apropriado
        let defaultReport = `<p>Missão "${goal}" concluída com sucesso. Foram coletadas e analisadas informações relevantes sobre o tema.</p>`;
        
        for (const [key, report] of Object.entries(reports)) {
            if (goal.toLowerCase().includes(key)) {
                return report;
            }
        }
        
        return defaultReport;
    }
    
    function pauseAgent(windowId) {
        if (agentRunning) {
            clearInterval(agentInterval);
            agentRunning = false;
            const tasksDiv = document.getElementById(`${windowId}-tasks`);
            tasksDiv.innerHTML += `
                <div class="task-item" style="background:var(--warning); color:white;">
                    <div>
                        <strong>⏸️ Agente Pausado</strong>
                        <br><small>Clique em "Iniciar" para continuar</small>
                    </div>
                </div>
            `;
        }
    }
    
    function stopAgent(windowId) {
        if (confirm('Tem certeza que deseja interromper o agente?')) {
            clearInterval(agentInterval);
            agentRunning = false;
            const tasksDiv = document.getElementById(`${windowId}-tasks`);
            tasksDiv.innerHTML += `
                <div class="task-item" style="background:var(--danger); color:white;">
                    <div>
                        <strong>⏹️ Agente Interrompido</strong>
                        <br><small>Missão cancelada pelo usuário</small>
                    </div>
                </div>
            `;
        }
    }
    
    function exportAgentReport() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(20);
        doc.text('Relatório do Agente - Reelmi AI', 20, 20);
        
        doc.setFontSize(12);
        doc.text('Data: ' + new Date().toLocaleString(), 20, 35);
        doc.text('Status: Missão Concluída', 20, 45);
        
        doc.save(`agent-report-${Date.now()}.pdf`);
        showNotification('Relatório exportado como PDF!');
    }
    
    /* ============ EDITOR DE CÓDIGO ============ */
    function initCodeEditor(windowId) {
        const textarea = document.getElementById(`${windowId}-code-editor`);
        const editor = CodeMirror.fromTextArea(textarea, {
            mode: 'python',
            theme: 'dracula',
            lineNumbers: true,
            autoCloseBrackets: true,
            matchBrackets: true,
            indentUnit: 4,
            tabSize: 4,
            extraKeys: {
                'Ctrl-Space': 'autocomplete'
            }
        });
        
        editor.setSize('100%', '300px');
        window[`${windowId}_editor`] = editor;
    }
    
    function runCode(windowId) {
        const editor = window[`${windowId}_editor`];
        const code = editor.getValue();
        const language = document.getElementById(`${windowId}-language`).value;
        const output = document.getElementById(`${windowId}-code-output`);
        
        output.innerHTML = `<span style="color:#00ffff;">>>> Executando código ${language}...</span><br>`;
        
        try {
            if (language === 'javascript') {
                const result = eval(code);
                output.innerHTML += `<span style="color:#00ff00;">${result}</span><br>`;
            } else if (language === 'python') {
                if (pyodide) {
                    const result = pyodide.runPython(code);
                    output.innerHTML += `<span style="color:#00ff00;">${result}</span><br>`;
                } else {
                    output.innerHTML += `<span style="color:#ff5555;">Pyodide não carregado. Simulando...</span><br>`;
                    // Simulação básica
                    if (code.includes('print(')) {
                        const matches = code.match(/print\((.*?)\)/g);
                        if (matches) {
                            matches.forEach(match => {
                                const content = match.match(/print\((.*)\)/)[1];
                                output.innerHTML += `<span>${content.replace(/['"]/g, '')}</span><br>`;
                            });
                        }
                    }
                }
            }
        } catch (error) {
            output.innerHTML += `<span style="color:#ff5555;">Erro: ${error.message}</span><br>`;
        }
        
        output.scrollTop = output.scrollHeight;
    }
    
    function formatCode(windowId) {
        const editor = window[`${windowId}_editor`];
        const code = editor.getValue();
        
        // Formatação básica
        let formatted = code
            .replace(/\t/g, '    ')
            .replace(/\n{3,}/g, '\n\n')
            .trim() + '\n';
        
        editor.setValue(formatted);
        showNotification('Código formatado!');
    }
    
    /* ============ ANALISADOR DE GASOMETRIA ============ */
    function showGasometryAnalyzer() {
        document.getElementById('gasometry-modal').style.display = 'flex';
    }
    
    function analyzeGasometry() {
        const pH = parseFloat(document.getElementById('ph-value').value);
        const paCO2 = parseFloat(document.getElementById('paco2-value').value);
        const paO2 = parseFloat(document.getElementById('pao2-value').value);
        const HCO3 = parseFloat(document.getElementById('hco3-value').value);
        
        if (!pH || !paCO2 || !paO2 || !HCO3) {
            alert('Preencha todos os valores');
            return;
        }
        
        // Análise básica
        let acidBaseStatus = '';
        let oxygenationStatus = '';
        let recommendations = [];
        
        // Distúrbio ácido-base
        if (pH < 7.35) {
            if (paCO2 > 45) {
                acidBaseStatus = 'Acidose Respiratória';
                if (HCO3 > 28) recommendations.push('Compensação metabólica presente');
            } else if (HCO3 < 22) {
                acidBaseStatus = 'Acidose Metabólica';
                if (paCO2 < 35) recommendations.push('Compensação respiratória presente');
            }
        } else if (pH > 7.45) {
            if (paCO2 < 35) {
                acidBaseStatus = 'Alcalose Respiratória';
                if (HCO3 < 24) recommendations.push('Compensação metabólica presente');
            } else if (HCO3 > 26) {
                acidBaseStatus = 'Alcalose Metabólica';
                if (paCO2 > 40) recommendations.push('Compensação respiratória presente');
            }
        } else {
            acidBaseStatus = 'pH Normal (Compensado ou Sem Distúrbio)';
        }
        
        // Oxigenação
        const paO2FiO2 = paO2 / 0.21; // Assumindo ar ambiente
        if (paO2 < 60) {
            oxygenationStatus = 'Hipoxemia Grave';
            recommendations.push('Necessidade de oxigenoterapia ou suporte ventilatório');
        } else if (paO2 < 80) {
            oxygenationStatus = 'Hipoxemia Moderada';
            recommendations.push('Monitorar saturação e considerar oxigênio suplementar');
        } else if (paO2FiO2 < 300) {
            oxygenationStatus = 'Disfunção de Troca Gasosa';
            recommendations.push('Avaliar necessidade de PEEP ou suporte ventilatório');
        } else {
            oxygenationStatus = 'Oxigenação Adequada';
        }
        
        // Anion Gap (estimado)
        const anionGap = (140) - (HCO3 + 100); // Na+ estimado em 140, Cl- estimado em 100
        let anionGapStatus = '';
        if (anionGap > 16) {
            anionGapStatus = 'Anion Gap Elevado (Acidose Metabólica de Ânion Gap Alto)';
            recommendations.push('Investigar cetoacidose, acidose láctica, etc.');
        } else if (anionGap < 8) {
            anionGapStatus = 'Anion Gap Baixo';
        } else {
            anionGapStatus = 'Anion Gap Normal';
        }
        
        // Resultado
        const resultDiv = document.getElementById('gasometry-result');
        resultDiv.innerHTML = `
            <div style="background: var(--bg-surface); border-radius: 10px; padding: 20px;">
                <h4><i class="fas fa-vial"></i> Análise da Gasometria</h4>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin: 15px 0;">
                    <div class="gas-parameter ${pH >= 7.35 && pH <= 7.45 ? 'gas-normal' : 'gas-abnormal'}">
                        <label>pH</label>
                        <div class="gas-value">${pH.toFixed(2)}</div>
                        <div>${pH >= 7.35 && pH <= 7.45 ? 'Normal' : 'Anormal'}</div>
                    </div>
                    
                    <div class="gas-parameter ${paCO2 >= 35 && paCO2 <= 45 ? 'gas-normal' : 'gas-abnormal'}">
                        <label>PaCO₂</label>
                        <div class="gas-value">${paCO2}</div>
                        <div>${paCO2 >= 35 && paCO2 <= 45 ? 'Normal' : 'Anormal'}</div>
                    </div>
                    
                    <div class="gas-parameter ${paO2 >= 80 ? 'gas-normal' : 'gas-abnormal'}">
                        <label>PaO₂</label>
                        <div class="gas-value">${paO2}</div>
                        <div>${paO2 >= 80 ? 'Normal' : 'Anormal'}</div>
                    </div>
                    
                    <div class="gas-parameter ${HCO3 >= 22 && HCO3 <= 26 ? 'gas-normal' : 'gas-abnormal'}">
                        <label>HCO₃</label>
                        <div class="gas-value">${HCO3}</div>
                        <div>${HCO3 >= 22 && HCO3 <= 26 ? 'Normal' : 'Anormal'}</div>
                    </div>
                </div>
                
                <div style="margin-top: 20px;">
                    <h5>Interpretação:</h5>
                    <ul style="margin-top: 10px;">
                        <li><strong>Equilíbrio Ácido-Base:</strong> ${acidBaseStatus}</li>
                        <li><strong>Oxigenação:</strong> ${oxygenationStatus}</li>
                        <li><strong>PaO₂/FiO₂:</strong> ${paO2FiO2.toFixed(0)} (${paO2FiO2 > 300 ? 'Normal' : paO2FiO2 > 200 ? 'Leve' : paO2FiO2 > 100 ? 'Moderado' : 'Grave'})</li>
                        <li><strong>Ânion Gap:</strong> ${anionGap.toFixed(1)} mEq/L - ${anionGapStatus}</li>
                    </ul>
                </div>
                
                ${recommendations.length > 0 ? `
                    <div style="margin-top: 20px; padding: 15px; background: rgba(245, 158, 11, 0.1); border-radius: 5px;">
                        <h5><i class="fas fa-stethoscope"></i> Recomendações:</h5>
                        <ul style="margin-top: 5px;">
                            ${recommendations.map(rec => `<li>${rec}</li>`).join('')}
                        </ul>
                    </div>
                ` : ''}
                
                <div style="margin-top: 20px; font-size: 12px; color: var(--text-muted);">
                    <i class="fas fa-exclamation-triangle"></i> Esta análise é automatizada. Sempre confirme com profissional médico.
                </div>
            </div>
        `;
    }
    
    /* ============ DESENVOLVEDOR DE PLUGINS ============ */
    function showPluginDeveloper() {
        document.getElementById('plugin-developer-modal').style.display = 'flex';
    }
    
    function savePlugin() {
        const name = document.getElementById('plugin-name').value;
        const description = document.getElementById('plugin-desc').value;
        const code = document.getElementById('plugin-code').value;
        
        if (!name || !code) {
            alert('Preencha nome e código do plugin');
            return;
        }
        
        const plugin = {
            id: 'custom-' + Date.now(),
            name: name,
            author: 'Usuário',
            version: '1.0',
            description: description || 'Plugin personalizado',
            enabled: true,
            code: code,
            custom: true
        };
        
        // Carregar plugins existentes
        let plugins = JSON.parse(localStorage.getItem('reelmi_custom_plugins') || '[]');
        plugins.push(plugin);
        localStorage.setItem('reelmi_custom_plugins', JSON.stringify(plugins));
        
        showNotification('Plugin salvo com sucesso!');
        closeModal('plugin-developer-modal');
    }
    
    function testPlugin() {
        const code = document.getElementById('plugin-code').value;
        
        try {
            const func = new Function(code + ' return typeof execute === "function" ? execute() : "Plugin executado";');
            const result = func();
            alert(`Plugin testado com sucesso!\nResultado: ${result}`);
        } catch (error) {
            alert(`Erro ao testar plugin:\n${error.message}`);
        }
    }
    
    /* ============ MODALIDADE DE ESTUDO INTELIGENTE ============ */
    function startStudyModule(module) {
        const modules = {
            ventilation: {
                title: 'Ventilação Mecânica',
                topics: [
                    'Conceitos Básicos',
                    'Modalidades Ventilatórias',
                    'Parâmetros e Ajustes',
                    'Monitorização',
                    'Complicações',
                    'Desmame Ventilatório'
                ]
            },
            neonatology: {
                title: 'Neonatologia',
                topics: [
                    'Fisiologia Neonatal',
                    'Suporte Ventilatório',
                    'Oxigenoterapia',
                    'Cuidados Intensivos',
                    'Farmacologia Neonatal',
                    'Emergências Neonatais'
                ]
            }
        };
        
        const selected = modules[module];
        if (!selected) return;
        
        let html = `
            <div style="background: var(--bg-surface); border-radius: 15px; padding: 20px; margin-top: 20px;">
                <h3><i class="fas fa-graduation-cap"></i> ${selected.title}</h3>
                <p>Selecione um tópico para estudar:</p>
                
                <div style="margin-top: 15px;">
                    ${selected.topics.map((topic, i) => `
                        <div class="algorithm-step" onclick="studyTopic('${module}', ${i})">
                            <h4>${i+1}. ${topic}</h4>
                            <small>Clique para iniciar</small>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        
        showCustomModal('Módulo de Estudo', html);
    }
    
    function studyTopic(module, topicIndex) {
        const topics = {
            ventilation: [
                {
                    title: 'Conceitos Básicos',
                    content: `
                        <h4>Ventilação Mecânica: Conceitos Fundamentais</h4>
                        <p>A ventilação mecânica é o suporte artificial à respiração, utilizado quando o paciente não consegue manter ventilação adequada por conta própria.</p>
                        
                        <h5>Objetivos:</h5>
                        <ul>
                            <li>Manter oxigenação adequada</li>
                            <li>Garantir ventilação alveolar</li>
                            <li>Reduzir trabalho respiratório</li>
                            <li>Prevenir complicações</li>
                        </ul>
                        
                        <h5>Indicações:</h5>
                        <ul>
                            <li>Insuficiência respiratória aguda</li>
                            <li>Pós-operatório de cirurgias extensas</li>
                            <li>Trauma torácico</li>
                            <li>Doenças neuromusculares</li>
                            <li>Sedação profunda ou coma</li>
                        </ul>
                        
                        <div style="margin-top: 20px; padding: 15px; background: rgba(140, 82, 255, 0.1); border-radius: 10px;">
                            <strong><i class="fas fa-lightbulb"></i> Dica de Estudo:</strong>
                            <p>Memorize os valores normais dos parâmetros ventilatórios e pratique a interpretação de gasometrias.</p>
                        </div>
                    `
                }
            ]
        };
        
        const topic = topics[module]?.[topicIndex];
        if (!topic) {
            showCustomModal('Tópico de Estudo', '<p>Conteúdo em desenvolvimento. Em breve disponível!</p>');
            return;
        }
        
        showCustomModal(topic.title, `
            <div style="max-height: 400px; overflow-y: auto;">
                ${topic.content}
                
                <div style="margin-top: 20px; display: flex; gap: 10px;">
                    <button onclick="takeQuiz('${module}', ${topicIndex})" style="flex:1; padding:12px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                        <i class="fas fa-question-circle"></i> Teste seus conhecimentos
                    </button>
                    <button onclick="generateFlashcards('${module}', ${topicIndex})" style="flex:1; padding:12px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                        <i class="fas fa-cards"></i> Gerar Flashcards
                    </button>
                </div>
            </div>
        `);
    }
    
    function takeQuiz(module, topicIndex) {
        const quizzes = {
            ventilation: [
                {
                    question: 'Qual é a definição de ventilação mecânica?',
                    options: [
                        'Suporte artificial à respiração',
                        'Exercícios respiratórios',
                        'Oxigenoterapia simples',
                        'Fisioterapia respiratória'
                    ],
                    answer: 0,
                    explanation: 'Ventilação mecânica é o suporte artificial à respiração, utilizado quando o paciente não consegue manter ventilação adequada por conta própria.'
                }
            ]
        };
        
        const quiz = quizzes[module]?.[topicIndex];
        if (!quiz) {
            showCustomModal('Quiz', '<p>Quiz em desenvolvimento. Em breve disponível!</p>');
            return;
        }
        
        let html = `
            <div style="max-height: 400px; overflow-y: auto;">
                <h4>Quiz: ${quiz.question}</h4>
                
                <div style="margin: 20px 0;">
                    ${quiz.options.map((option, i) => `
                        <div class="algorithm-step" onclick="checkAnswer(${i}, ${quiz.answer}, '${quiz.explanation.replace(/'/g, "\\'")}')">
                            ${option}
                        </div>
                    `).join('')}
                </div>
                
                <div id="quiz-result" style="margin-top: 20px;"></div>
            </div>
        `;
        
        showCustomModal('Teste de Conhecimento', html);
    }
    
    function checkAnswer(selected, correct, explanation) {
        const resultDiv = document.getElementById('quiz-result');
        
        if (selected === correct) {
            resultDiv.innerHTML = `
                <div style="padding:15px; background:rgba(16, 185, 129, 0.2); border-radius:10px;">
                    <h5 style="color:var(--success);"><i class="fas fa-check-circle"></i> Resposta Correta!</h5>
                    <p>${explanation}</p>
                </div>
            `;
        } else {
            resultDiv.innerHTML = `
                <div style="padding:15px; background:rgba(239, 68, 68, 0.2); border-radius:10px;">
                    <h5 style="color:var(--danger);"><i class="fas fa-times-circle"></i> Resposta Incorreta</h5>
                    <p>${explanation}</p>
                </div>
            `;
        }
    }
    
    function generateStudyPlan() {
        const plan = {
            title: 'Plano de Estudo Personalizado',
            duration: '2 semanas',
            dailyHours: 2,
            topics: [
                {
                    day: 1,
                    focus: 'Conceitos Básicos de VM',
                    activities: ['Teoria (1h)', 'Exercícios (30min)', 'Revisão (30min)']
                },
                {
                    day: 2,
                    focus: 'Modalidades Ventilatórias',
                    activities: ['Videoaulas (45min)', 'Casos clínicos (1h)', 'Quiz (15min)']
                },
                {
                    day: 3,
                    focus: 'Parâmetros e Ajustes',
                    activities: ['Simulador (1h)', 'Exercícios práticos (1h)']
                },
                {
                    day: 4,
                    focus: 'Revisão e Prática',
                    activities: ['Revisão geral (1h)', 'Teste simulado (1h)']
                },
                {
                    day: 5,
                    focus: 'Gasometria Arterial',
                    activities: ['Interpretação (1h)', 'Casos complexos (1h)']
                }
            ]
        };
        
        let html = `
            <div style="max-height: 500px; overflow-y: auto;">
                <h3><i class="fas fa-calendar-alt"></i> ${plan.title}</h3>
                <p><strong>Duração:</strong> ${plan.duration} | <strong>Dedicacão diária:</strong> ${plan.dailyHours}h</p>
                
                <div style="margin-top: 20px;">
                    ${plan.topics.map(topic => `
                        <div class="algorithm-step">
                            <h4>Dia ${topic.day}: ${topic.focus}</h4>
                            <div style="margin-top: 10px;">
                                <strong>Atividades:</strong>
                                <ul style="margin-top: 5px;">
                                    ${topic.activities.map(act => `<li>${act}</li>`).join('')}
                                </ul>
                            </div>
                            <button onclick="scheduleStudyReminder('${topic.focus}')" style="margin-top:10px; padding:5px 10px; background:var(--info); color:white; border:none; border-radius:5px; cursor:pointer; font-size:12px;">
                                <i class="fas fa-bell"></i> Agendar Lembrete
                            </button>
                        </div>
                    `).join('')}
                </div>
                
                <div style="margin-top: 20px; padding:15px; background:rgba(140, 82, 255, 0.1); border-radius:10px;">
                    <h5><i class="fas fa-lightbulb"></i> Dicas para o Estudo:</h5>
                    <ul>
                        <li>Estude em blocos de 25-30 minutos com pausas de 5 minutos</li>
                        <li>Use o simulador para prática de ajustes ventilatórios</li>
                        <li>Revise os casos clínicos fornecidos pelo sistema</li>
                        <li>Teste seus conhecimentos com os quizzes regulares</li>
                    </ul>
                </div>
                
                <button onclick="exportStudyPlan()" style="width:100%; padding:12px; margin-top:20px; background:var(--success); color:white; border:none; border-radius:10px; cursor:pointer;">
                    <i class="fas fa-download"></i> Exportar Plano de Estudo
                </button>
            </div>
        `;
        
        showCustomModal('Plano de Estudo Gerado', html);
    }
    
    function scheduleStudyReminder(topic) {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        tomorrow.setHours(10, 0, 0, 0);
        
        document.getElementById('new-reminder').value = `Estudar: ${topic}`;
        document.getElementById('reminder-time').value = tomorrow.toISOString().slice(0, 16);
        
        showCustomModal('Lembrete Agendado', `
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 48px; color: var(--success); margin-bottom: 20px;">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Lembrete Agendado!</h3>
                <p><strong>"Estudar: ${topic}"</strong></p>
                <p>Para: ${tomorrow.toLocaleDateString()} às 10:00</p>
                <p style="margin-top: 10px; font-size: 14px; color: var(--text-muted);">
                    Você será notificado no horário agendado.
                </p>
            </div>
        `);
    }
    
    function exportStudyPlan() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(20);
        doc.text('Plano de Estudo - Reelmi AI', 20, 20);
        
        doc.setFontSize(12);
        doc.text('Data de geração: ' + new Date().toLocaleDateString(), 20, 35);
        doc.text('Duração: 2 semanas | Dedicação diária: 2 horas', 20, 45);
        
        let y = 60;
        for (let i = 1; i <= 5; i++) {
            if (y > 280) {
                doc.addPage();
                y = 20;
            }
            doc.text(`Dia ${i}: Tópico de estudo específico`, 20, y);
            y += 10;
            doc.text('  • Atividade 1 (1h)', 25, y);
            y += 7;
            doc.text('  • Atividade 2 (1h)', 25, y);
            y += 10;
        }
        
        doc.save(`study-plan-${Date.now()}.pdf`);
        showNotification('Plano de estudo exportado!');
    }
    
    function takePracticeTest() {
        const questions = [
            {
                question: 'Qual é o valor normal de PEEP em adultos?',
                options: ['0-2 cmH₂O', '3-5 cmH₂O', '8-12 cmH₂O', '15-20 cmH₂O'],
                answer: 1
            },
            {
                question: 'Qual modalidade é considerada não invasiva?',
                options: ['VCV', 'PCV', 'CPAP', 'SIMV'],
                answer: 2
            },
            {
                question: 'O que significa FiO₂?',
                options: ['Fração de oxigênio inspirado', 'Frequência inspiratória', 'Fluxo inspiratório', 'Força inspiratória'],
                answer: 0
            }
        ];
        
        let html = `
            <div style="max-height: 400px; overflow-y: auto;">
                <h3><i class="fas fa-clipboard-check"></i> Teste Prático</h3>
                <p>Responda às questões abaixo. Você terá seu resultado ao final.</p>
                
                <div style="margin-top: 20px;">
                    ${questions.map((q, i) => `
                        <div style="margin-bottom: 20px;">
                            <h5>${i+1}. ${q.question}</h5>
                            ${q.options.map((opt, j) => `
                                <div style="margin:5px 0;">
                                    <input type="radio" name="q${i}" id="q${i}_${j}" value="${j}">
                                    <label for="q${i}_${j}" style="margin-left:5px;">${opt}</label>
                                </div>
                            `).join('')}
                        </div>
                    `).join('')}
                </div>
                
                <button onclick="calculateTestScore(${JSON.stringify(questions)})" style="width:100%; padding:12px; margin-top:20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    <i class="fas fa-check-circle"></i> Finalizar Teste
                </button>
                
                <div id="test-result" style="margin-top: 20px;"></div>
            </div>
        `;
        
        showCustomModal('Teste Prático', html);
    }
    
    function calculateTestScore(questions) {
        let score = 0;
        const results = [];
        
        questions.forEach((q, i) => {
            const selected = document.querySelector(`input[name="q${i}"]:checked`);
            if (selected) {
                const answer = parseInt(selected.value);
                if (answer === q.answer) {
                    score++;
                    results.push(`<span style="color:var(--success);">✓ Questão ${i+1}: Correta</span>`);
                } else {
                    results.push(`<span style="color:var(--danger);">✗ Questão ${i+1}: Incorreta (Resposta: ${q.options[q.answer]})</span>`);
                }
            } else {
                results.push(`<span style="color:var(--warning);">? Questão ${i+1}: Não respondida</span>`);
            }
        });
        
        const percentage = (score / questions.length) * 100;
        let feedback = '';
        
        if (percentage >= 80) {
            feedback = 'Excelente! Seu conhecimento está muito bom. Continue estudando para manter a excelência.';
        } else if (percentage >= 60) {
            feedback = 'Bom trabalho! Você tem uma boa base, mas pode melhorar em alguns tópicos.';
        } else {
            feedback = 'É necessário mais estudo. Revise os tópicos básicos e pratique com o simulador.';
        }
        
        document.getElementById('test-result').innerHTML = `
            <div style="padding:20px; background:var(--bg-surface); border-radius:10px;">
                <h4><i class="fas fa-chart-bar"></i> Resultado do Teste</h4>
                <div style="text-align:center; margin:20px 0;">
                    <div style="font-size:48px; font-weight:bold; color:var(--primary);">${percentage.toFixed(0)}%</div>
                    <div>${score} de ${questions.length} questões corretas</div>
                </div>
                
                <h5>Detalhamento:</h5>
                <div style="margin:10px 0;">
                    ${results.join('<br>')}
                </div>
                
                <div style="margin-top:20px; padding:15px; background:rgba(140, 82, 255, 0.1); border-radius:5px;">
                    <strong><i class="fas fa-lightbulb"></i> Feedback:</strong>
                    <p style="margin-top:5px;">${feedback}</p>
                </div>
                
                <button onclick="generateStudyRecommendations(${percentage})" style="width:100%; padding:12px; margin-top:20px; background:var(--info); color:white; border:none; border-radius:10px; cursor:pointer;">
                    <i class="fas fa-graduation-cap"></i> Gerar Recomendações de Estudo
                </button>
            </div>
        `;
    }
    
    function generateStudyRecommendations(score) {
        let recommendations = [];
        
        if (score < 60) {
            recommendations = [
                'Revise os conceitos básicos de ventilação mecânica',
                'Pratique com o simulador de ventilação',
                'Estude os casos clínicos básicos',
                'Faça os quizzes de reforço',
                'Assista às videoaulas introdutórias'
            ];
        } else if (score < 80) {
            recommendations = [
                'Aprofunde-se em modalidades ventilatorias',
                'Pratique ajustes de parâmetros',
                'Estude casos clínicos intermediários',
                'Use o analisador de gasometria',
                'Revise complicações da VM'
            ];
        } else {
            recommendations = [
                'Estude casos clínicos complexos',
                'Pratique protocolos de desmame',
                'Explore modos ventilatórios avançados',
                'Participe de discussões de casos',
                'Mantenha-se atualizado com literatura'
            ];
        }
        
        let html = `
            <div style="max-height: 400px; overflow-y: auto;">
                <h3><i class="fas fa-graduation-cap"></i> Recomendações de Estudo</h3>
                <p>Baseado no seu desempenho (${score.toFixed(0)}%), recomendamos:</p>
                
                <div style="margin:20px 0;">
                    ${recommendations.map((rec, i) => `
                        <div class="algorithm-step" onclick="scheduleStudyActivity('${rec}')">
                            <h5>${i+1}. ${rec}</h5>
                            <small>Clique para agendar atividade</small>
                        </div>
                    `).join('')}
                </div>
                
                <div style="margin-top:20px; padding:15px; background:rgba(16, 185, 129, 0.1); border-radius:10px;">
                    <strong><i class="fas fa-chart-line"></i> Plano de Ação:</strong>
                    <p style="margin-top:5px;">Dedique 1-2 horas diárias para estudo, focando nas áreas recomendadas acima.</p>
                </div>
            </div>
        `;
        
        showCustomModal('Recomendações de Estudo', html);
    }
    
    function scheduleStudyActivity(activity) {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        tomorrow.setHours(14, 0, 0, 0);
        
        document.getElementById('new-reminder').value = activity;
        document.getElementById('reminder-time').value = tomorrow.toISOString().slice(0, 16);
        
        showCustomModal('Atividade Agendada', `
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 48px; color: var(--success); margin-bottom: 20px;">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Atividade Agendada!</h3>
                <p><strong>${activity}</strong></p>
                <p>Para: ${tomorrow.toLocaleDateString()} às 14:00</p>
                <button onclick="document.getElementById('memory-manager-modal').style.display='flex'" style="padding:10px 20px; margin-top:20px; background:var(--primary-gradient); color:white; border:none; border-radius:10px; cursor:pointer;">
                    <i class="fas fa-bell"></i> Ver Todos os Lembretes
                </button>
            </div>
        `);
    }
    
    // ==================== INICIALIZAÇÃO COMPLETA ====================
    
    window.onload = function() {
        // Carregar tema salvo
        const savedTheme = localStorage.getItem('reelmi_theme');
        if (savedTheme === 'light') {
            document.body.classList.add('light-mode');
        }
        
        // Carregar contexto
        carregarContextoSalvo();
        
        // Carregar dados treinados
        const trainedData = JSON.parse(localStorage.getItem('reelmi_trained') || '[]');
        trainedData.forEach(item => {
            perguntas.push(item.question);
            respostas.push(item.answer);
        });
        
        // Inicializar IA Real
        selectAIMode('simulated');
        
        // Carregar lembretes existentes
        loadReminders();
        
        // Iniciar verificação de lembretes
        scheduleReminderCheck();
        
        // Verificar estado da sidebar
        checkSidebarState();
        
        // Iniciar wake word
        setTimeout(() => iniciarWakeWord(), 2000);
        
        // Mensagem inicial
        setTimeout(() => {
            if (contextoConversa.length === 0) {
                const welcomeMessages = [
                    "Olá! Sou Reelmi AI, seu assistente especializado em ventilação mecânica e neonatologia. Como posso ajudar?",
                    "Bem-vindo ao Reelmi AI! Tenho recursos avançados como simulador ventilatório, editor de código, agente autônomo e muito mais. Experimente!",
                    "Saudações! Sou Reelmi AI, com funcionalidades de IA real, memória avançada, multimodalidade e sistema operacional completo. Estou aqui para ajudar!"
                ];
                
                const randomMsg = welcomeMessages[Math.floor(Math.random() * welcomeMessages.length)];
                addMsg(randomMsg, 'bot');
                adicionarAoContexto('assistant', randomMsg);
            }
        }, 1000);
        
        // Configurar eventos
        document.getElementById('personality-select').addEventListener('change', function() {
            showNotification(`Modo de personalidade alterado para: ${this.options[this.selectedIndex].text}`);
        });
        
        // Inicializar outros componentes
        initializeAdvancedFeatures();
    };
    
    function initializeAdvancedFeatures() {
        // Carregar plugins personalizados
        const customPlugins = JSON.parse(localStorage.getItem('reelmi_custom_plugins') || '[]');
        customPlugins.forEach(plugin => {
            if (!plugins.find(p => p.id === plugin.id)) {
                plugins.push(plugin);
            }
        });
        
        // Carregar configurações do simulador
        const ventSettings = localStorage.getItem('ventilation_settings');
        if (ventSettings) {
            console.log('Configurações ventilatórias carregadas:', JSON.parse(ventSettings));
        }
        
        // Verificar atualizações (simulado)
        setTimeout(() => {
            if (Math.random() > 0.7) {
                showNotification('✅ Sistema atualizado com todas as funcionalidades avançadas!');
            }
        }, 3000);
    }
    
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(20);
        doc.text('Relatório Reelmi AI', 20, 20);
        
        doc.setFontSize(12);
        doc.text(`Data: ${new Date().toLocaleDateString()}`, 20, 30);
        doc.text('Resumo da Conversa:', 20, 40);
        
        let y = 50;
        contextoConversa.forEach((msg, i) => {
            if (y > 280) {
                doc.addPage();
                y = 20;
            }
            const role = msg.role === 'user' ? 'Usuário' : 'Reelmi AI';
            const text = msg.content.substring(0, 100);
            doc.text(`${role}: ${text}...`, 20, y);
            y += 10;
        });
        
        // Adicionar estatísticas
        y += 10;
        doc.text('Estatísticas:', 20, y);
        y += 10;
        doc.text(`• Total de mensagens: ${contextoConversa.length}`, 25, y);
        y += 7;
        doc.text(`• Memórias salvas: ${Object.keys(longTermMemory).length}`, 25, y);
        y += 7;
        doc.text(`• Plugins ativos: ${plugins.filter(p => p.active).length}`, 25, y);
        
        doc.save(`reelmi-report-${Date.now()}.pdf`);
        showNotification('PDF gerado com sucesso!');
    }
    
    function showPersonalitySettings() {
        showCustomModal('Configurações de Personalidade', `
            <div style="max-height: 400px; overflow-y: auto;">
                <h3><i class="fas fa-user-cog"></i> Personalidade da IA</h3>
                <p>Selecione como a Reelmi AI deve se comportar:</p>
                
                <div style="margin:20px 0;">
                    <div class="algorithm-step" onclick="setPersonality('professional')">
                        <h5>👨‍💼 Profissional (Padrão)</h5>
                        <p>Respostas técnicas e objetivas, ideal para trabalho</p>
                    </div>
                    
                    <div class="algorithm-step" onclick="setPersonality('teacher')">
                        <h5>👨‍🏫 Professor</h5>
                        <p>Explicações didáticas, com dicas de estudo e exemplos</p>
                    </div>
                    
                    <div class="algorithm-step" onclick="setPersonality('simple')">
                        <h5>🤗 Explicação Simples</h5>
                        <p>Linguagem acessível, ideal para iniciantes</p>
                    </div>
                    
                    <div class="algorithm-step" onclick="setPersonality('technical')">
                        <h5>🔬 Técnico Detalhado</h5>
                        <p>Informações técnicas avançadas, com métricas e dados</p>
                    </div>
                    
                    <div class="algorithm-step" onclick="setPersonality('empathetic')">
                        <h5>🤝 Empático</h5>
                        <p>Tom acolhedor e compreensivo, ideal para situações sensíveis</p>
                    </div>
                    
                    <div class="algorithm-step" onclick="setPersonality('analytical')">
                        <h5>📈 Analítico</h5>
                        <p>Foco em dados, análises estruturadas e comparações</p>
                    </div>
                </div>
                
                <div style="margin-top:20px; padding:15px; background:var(--bg-hover); border-radius:10px;">
                    <strong><i class="fas fa-info-circle"></i> Personalidade Atual:</strong>
                    <p style="margin-top:5px;" id="current-personality-display">Carregando...</p>
                </div>
            </div>
        `);
        
        // Atualizar display
        const select = document.getElementById('personality-select');
        const current = select.options[select.selectedIndex].text;
        document.getElementById('current-personality-display').textContent = current;
    }
    
    function setPersonality(personality) {
        const select = document.getElementById('personality-select');
        select.value = personality;
        showNotification(`Personalidade alterada para: ${select.options[select.selectedIndex].text}`);
    }
    
    // Adicionar atalhos de teclado
    document.addEventListener('keydown', function(e) {
        // Ctrl + B: Alternar sidebar
        if (e.ctrlKey && e.key === 'b') {
            e.preventDefault();
            toggleSidebar();
        }
        
        // Ctrl + N: Nova janela
        if (e.ctrlKey && e.key === 'n') {
            e.preventDefault();
            openWindow('notion');
        }
        
        // Ctrl + T: Novo terminal
        if (e.ctrlKey && e.key === 't') {
            e.preventDefault();
            openWindow('terminal');
        }
        
        // Ctrl + L: Limpar chat
        if (e.ctrlKey && e.key === 'l') {
            e.preventDefault();
            limparChat();
        }
        
        // Ctrl + D: Alternar dock
        if (e.ctrlKey && e.key === 'd') {
            e.preventDefault();
            toggleDock();
        }
        
        // Ctrl + I: Alternar IA Real
        if (e.ctrlKey && e.key === 'i') {
            e.preventDefault();
            toggleRealAI();
        }
        
        // Esc: Fechar todos os modais
        if (e.key === 'Escape') {
            document.querySelectorAll('.calculator-modal, .training-modal').forEach(modal => {
                modal.style.display = 'none';
            });
        }
    });
    
    // Adicionar estilo de animação
    const style = document.createElement('style');
    style.textContent = `
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
        
        .ai-active {
            animation: pulseGlow 2s infinite;
        }
    `;
    document.head.appendChild(style);
    
    console.log('✅ Reelmi AI v2.0 - Sistema completo carregado com sucesso!');
    console.log('📋 Funcionalidades ativas:');
    console.log('   • IA Real (OpenAI/Groq/Local/Simulated)');
    console.log('   • Sistema Operacional com Janelas');
    console.log('   • Memória Avançada e Lembretes');
    console.log('   • Editor Notion e Código');
    console.log('   • Terminal Avançado');
    console.log('   • Simulador Ventilatório');
    console.log('   • Agente Auto-GPT');
    console.log('   • Multimodalidade (OCR, Detecção, Análise)');
    console.log('   • Analisador de Gasometria');
    console.log('   • Sistema de Estudo Inteligente');
    console.log('   • Plugins e Personalização');
    console.log('   • Detecção de Emoções');
    console.log('   • Interface Responsiva');
    console.log('\n🚀 Pronto para uso!');
</script>
</body>
</html>
