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
    /* RESET E ESTILOS GERAIS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    :root {
        --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        --secondary-gradient: linear-gradient(135deg, #4cc9f0 0%, #4895ef 100%);
        --accent-gradient: linear-gradient(135deg, #00dbde 0%, #fc00ff 100%);
        --danger-gradient: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
        --dark-bg: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        --card-bg: linear-gradient(145deg, #0f3460, #1a1a2e);
        --sidebar-bg: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        --text-primary: #ffffff;
        --text-secondary: #b8c1ec;
        --text-muted: #8a8fb3;
        --border-color: rgba(255, 255, 255, 0.1);
        --shadow: 0 15px 35px rgba(0,0,0,0.3);
        --shadow-hover: 0 20px 40px rgba(0,0,0,0.4);
        --radius-sm: 12px;
        --radius-md: 20px;
        --radius-lg: 24px;
        --radius-full: 50px;
        --transition: all 0.3s ease;
    }

    body {
        background: var(--dark-bg);
        color: var(--text-primary);
        min-height: 100vh;
        transition: var(--transition), font-size 0.3s ease;
        line-height: 1.6;
        display: flex;
        overflow-x: hidden;
        font-size: 100%;
    }

    /* SIDEBAR */
    .sidebar {
        width: 260px;
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

    /* NOVO: Botão de fechar sidebar no topo */
    .sidebar-close-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(67, 97, 238, 0.2);
        border: 1.5px solid rgba(67, 97, 238, 0.3);
        color: var(--text-primary);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 14px;
        z-index: 1001;
        display: none; /* Oculto por padrão, visível apenas em mobile */
    }

    .sidebar-close-btn:hover {
        background: rgba(67, 97, 238, 0.3);
        transform: scale(1.1);
    }

    .sidebar-header {
        padding: 0 20px 15px 20px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        position: relative; /* Para posicionar o botão de fechar */
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .sidebar-logo .icon {
        font-size: 26px;
        background: var(--accent-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: pulse 2s infinite;
    }

    .sidebar-logo h1 {
        font-size: 18px;
        font-weight: 700;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sidebar-menu {
        flex: 1;
        padding: 0 15px;
        overflow-y: auto;
    }

    .sidebar-menu-section {
        margin-bottom: 22px;
    }

    .sidebar-menu-section h3 {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--text-muted);
        margin-bottom: 12px;
        font-weight: 600;
        padding-left: 8px;
    }

    .sidebar-menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
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
        background: rgba(67, 97, 238, 0.12);
        color: var(--text-primary);
        transform: translateX(4px);
    }

    .sidebar-menu-item.active {
        background: rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        border-left: 3px solid #4361ee;
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

    .sidebar-footer {
        padding: 15px 15px 0 15px;
        border-top: 1px solid var(--border-color);
        margin-top: auto;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: rgba(255, 255, 255, 0.04);
        border-radius: var(--radius-sm);
        margin-bottom: 15px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--accent-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .user-info h4 {
        font-size: 14px;
        margin-bottom: 3px;
        color: var(--text-primary);
    }

    .user-info p {
        font-size: 12px;
        color: var(--text-muted);
    }

    /* REMOVIDO OS BOTÕES DE TEMA E SAIR */
    .sidebar-footer > div {
        display: none;
    }

    .sidebar-toggle {
        position: fixed;
        left: 15px;
        top: 15px;
        z-index: 1001;
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .sidebar-toggle:hover {
        background: rgba(67, 97, 238, 0.5);
        transform: scale(1.05);
    }

    .main-content {
        flex: 1;
        margin-left: 260px;
        transition: margin-left 0.3s ease;
        min-height: 100vh;
        position: relative;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 25px 20px;
        transition: opacity 0.3s ease;
        position: relative;
        z-index: 1;
    }

    /* UTILITÁRIOS */
    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    /* HEADER - MAIS REDUZIDO */
    .header {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
        animation: fadeInDown 0.6s ease-out;
    }

    .header .icon {
        font-size: 30px;
        margin-bottom: 8px;
        display: inline-block;
        background: var(--accent-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 3px 6px rgba(0,0,0,0.15));
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.03); }
        100% { transform: scale(1); }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .header h1 {
        font-weight: 700;
        font-size: 22px;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
        text-shadow: 0 1px 3px rgba(0,0,0,0.15);
        line-height: 1.2;
    }

    .header p {
        color: var(--text-secondary);
        font-size: 13px;
        font-weight: 400;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.4;
    }

    /* BOTÕES DE CONTROLE NO HEADER - MODIFICADO E REDUZIDOS */
    .header-controls {
        position: absolute;
        top: 0;
        right: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 1002;
    }

    /* BOTÃO DE TEMA - MENOR */
    .theme-btn {
        background: rgba(67, 97, 238, 0.1);
        border: 1.5px solid rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        width: 38px; /* Reduzido de 42px */
        height: 38px; /* Reduzido de 42px */
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 16px; /* Reduzido de 18px */
        backdrop-filter: blur(10px);
        position: relative;
        z-index: 1003;
    }

    .theme-btn:hover {
        background: rgba(67, 97, 238, 0.2);
        border-color: rgba(67, 97, 238, 0.4);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .theme-btn.active {
        background: rgba(67, 97, 238, 0.25);
        border-color: #4361ee;
        color: #4361ee;
    }

    /* BOTÃO DE FUNCIONALIDADES - MENOR */
    .features-btn {
        background: rgba(67, 97, 238, 0.1);
        border: 1.5px solid rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        width: 38px; /* Reduzido de 42px */
        height: 38px; /* Reduzido de 42px */
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 16px; /* Reduzido de 18px */
        backdrop-filter: blur(10px);
        position: relative;
        z-index: 1003;
    }

    .features-btn:hover {
        background: rgba(67, 97, 238, 0.2);
        border-color: rgba(67, 97, 238, 0.4);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .features-btn.active {
        background: rgba(67, 97, 238, 0.25);
        border-color: #4361ee;
        color: #4361ee;
    }

    .features-panel {
        position: fixed;
        top: 70px;
        right: 20px;
        background: var(--card-bg);
        border-radius: 16px;
        padding: 15px;
        width: 280px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        z-index: 1100;
        display: none;
        backdrop-filter: blur(20px);
        animation: slideIn 0.3s ease;
        max-height: 80vh;
        overflow-y: auto;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .features-panel::before {
        content: '';
        position: absolute;
        top: -8px;
        right: 20px;
        width: 16px;
        height: 16px;
        background: var(--card-bg);
        transform: rotate(45deg);
        border-left: 1px solid var(--border-color);
        border-top: 1px solid var(--border-color);
        z-index: -1;
    }

    .features-panel h3 {
        font-size: 16px;
        margin-bottom: 15px;
        color: var(--text-primary);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-color);
    }

    .features-panel h3 i {
        color: #00dbde;
    }

    /* CONTROLES DE FONTE - NOVO */
    .font-controls {
        display: flex;
        gap: 6px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border-color);
        justify-content: space-between;
    }

    .font-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 12px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 4px;
        flex: 1;
        justify-content: center;
        min-height: 32px;
        font-weight: 600;
    }

    .font-btn:hover {
        background: rgba(67, 97, 238, 0.15);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .font-btn.font-decrease {
        background: rgba(247, 37, 133, 0.1);
        border-color: rgba(247, 37, 133, 0.2);
        color: #f72585;
    }

    .font-btn.font-decrease:hover {
        background: rgba(247, 37, 133, 0.2);
    }

    .font-btn.font-reset {
        background: rgba(76, 201, 240, 0.1);
        border-color: rgba(76, 201, 240, 0.2);
        color: #4cc9f0;
    }

    .font-btn.font-reset:hover {
        background: rgba(76, 201, 240, 0.2);
    }

    .font-btn.font-increase {
        background: rgba(16, 163, 127, 0.1);
        border-color: rgba(16, 163, 127, 0.2);
        color: #10a37f;
    }

    .font-btn.font-increase:hover {
        background: rgba(16, 163, 127, 0.2);
    }

    .features-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        border-radius: 12px;
        transition: var(--transition);
        cursor: pointer;
        color: var(--text-secondary);
        text-decoration: none;
        border: 1px solid transparent;
        background: rgba(255, 255, 255, 0.03);
    }

    .feature-item:hover {
        background: rgba(67, 97, 238, 0.15);
        color: var(--text-primary);
        transform: translateX(5px);
        border-color: rgba(67, 97, 238, 0.2);
    }

    .feature-item.active {
        background: rgba(67, 97, 238, 0.2);
        color: #4361ee;
        border-color: rgba(67, 97, 238, 0.3);
    }

    .feature-item i {
        font-size: 16px;
        width: 20px;
        text-align: center;
    }

    .feature-item .feature-text {
        flex: 1;
        font-size: 14px;
        font-weight: 500;
    }

    .feature-item .feature-badge {
        background: rgba(0, 219, 222, 0.15);
        color: #00dbde;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .feature-item .toggle-switch {
        position: relative;
        width: 44px;
        height: 24px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: var(--transition);
    }

    .feature-item .toggle-switch.active {
        background: #00dbde;
    }

    .feature-item .toggle-switch::before {
        content: '';
        position: absolute;
        top: 3px;
        left: 3px;
        width: 18px;
        height: 18px;
        background: white;
        border-radius: 50%;
        transition: var(--transition);
    }

    .feature-item .toggle-switch.active::before {
        transform: translateX(20px);
    }

    /* TOOLTIP PARA BOTÕES - MODIFICADO */
    .btn-tooltip {
        position: absolute;
        bottom: -35px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 11px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
        z-index: 100;
        pointer-events: none;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .theme-btn:hover .btn-tooltip,
    .features-btn:hover .btn-tooltip {
        opacity: 1;
        visibility: visible;
        bottom: -32px;
    }

    /* INPUT SECTION - MODIFICADA */
    .input-box {
        background: var(--card-bg);
        border-radius: 18px;
        padding: 14px 18px;
        box-shadow: var(--shadow), 
                    inset 0 1px 0 rgba(255,255,255,0.1);
        margin-bottom: 22px;
        border: 1px solid var(--border-color);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out 0.1s both;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .input-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--accent-gradient);
        border-radius: 18px 0 0 18px;
    }

    .input-box:hover {
        box-shadow: var(--shadow-hover), 
                    inset 0 1px 0 rgba(255,255,255,0.12);
        transform: translateY(-2px);
        border-color: rgba(0, 219, 222, 0.25);
    }

    .input-box.focused {
        box-shadow: 0 8px 20px rgba(0, 219, 222, 0.12), 
                    inset 0 1px 0 rgba(255,255,255,0.1);
        border-color: rgba(0, 219, 222, 0.25);
    }

    .input-box input {
        width: 100%;
        border: none;
        font-size: 14.5px;
        outline: none;
        padding: 9px 0;
        color: var(--text-primary);
        font-weight: 500;
        background: transparent;
        letter-spacing: 0.25px;
        min-height: 36px;
    }

    .input-box input::placeholder {
        color: var(--text-muted);
        font-weight: 400;
        font-size: 13.5px;
    }

    .input-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        position: relative;
    }

    .input-actions-left {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .input-actions-right {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    /* BOTÕES REDONDOS - REDUZIDOS */
    .btn-round {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        transition: var(--transition);
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        border: 1.5px solid transparent;
        position: relative;
        backdrop-filter: blur(10px);
        flex-shrink: 0;
    }

    .btn-round:hover {
        transform: translateY(-2px) scale(1.08);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .btn-round:active {
        transform: translateY(-1px) scale(1.04);
    }

    .btn-round i {
        font-size: 16px;
    }

    .btn-round-primary {
        background: var(--primary-gradient);
        color: var(--text-primary);
    }

    .btn-round-primary:hover {
        background: linear-gradient(135deg, #3a56d4, #2e0a8a);
    }

    .btn-round-secondary {
        background: var(--secondary-gradient);
        color: var(--text-primary);
    }

    .btn-round-secondary:hover {
        background: linear-gradient(135deg, #44b1d8, #3a84d7);
    }

    .btn-round-danger {
        background: var(--danger-gradient);
        color: var(--text-primary);
    }

    .btn-round-danger:hover {
        background: linear-gradient(135deg, #e01e76, #a0148d);
    }

    .btn-round-accent {
        background: var(--accent-gradient);
        color: var(--text-primary);
    }

    .btn-round-accent:hover {
        background: linear-gradient(135deg, #00c4c7, #e600e6);
    }

    /* NOVO: Botão de enviar */
    .btn-round-send {
        background: linear-gradient(135deg, #10a37f 0%, #0d8a6b 100%);
        color: var(--text-primary);
    }

    .btn-round-send:hover {
        background: linear-gradient(135deg, #0d8a6b, #0b7057);
    }

    .btn-round.active {
        animation: pulse 1.5s infinite;
        box-shadow: 0 0 15px rgba(0, 219, 222, 0.4);
    }

    /* NOVO: Botão de voz quando está ouvindo */
    .btn-round.listening {
        animation: listeningPulse 1.5s infinite !important;
        background: var(--danger-gradient) !important;
    }

    @keyframes listeningPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(247, 37, 133, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(247, 37, 133, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(247, 37, 133, 0);
        }
    }

    /* TOOLTIP PARA BOTÕES REDONDOS */
    .btn-round:hover .btn-tooltip {
        opacity: 1;
        visibility: visible;
        bottom: -32px;
    }

    /* BOTÕES NORMAIS (PARA OUTROS USOS) - REDUZIDOS */
    .btn {
        border: none;
        padding: 10px 18px;
        border-radius: var(--radius-full);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        transition: var(--transition);
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        border: 1.5px solid transparent;
        backdrop-filter: blur(10px);
        min-width: 110px;
        justify-content: center;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .btn:active {
        transform: translateY(-1px);
    }

    .btn i {
        font-size: 14px;
    }

    /* SHORTCUTS - MAIS REDUZIDOS */
    .shortcuts-section {
        margin-bottom: 25px;
        animation: fadeInUp 0.6s ease-out 0.2s both;
    }

    .shortcuts {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .shortcut {
        border: none;
        padding: 10px 16px;
        border-radius: var(--radius-full);
        font-size: 13px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        font-weight: 600;
        color: var(--text-primary);
        border: 1.5px solid rgba(255, 255, 255, 0.08);
        background: linear-gradient(145deg, rgba(67, 97, 238, 0.15), rgba(58, 12, 163, 0.15));
        backdrop-filter: blur(10px);
        min-width: 130px;
        justify-content: center;
    }

    .shortcut:hover {
        background: linear-gradient(145deg, rgba(67, 97, 238, 0.25), rgba(58, 12, 163, 0.25));
        transform: translateY(-4px) scale(1.04);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        border-color: rgba(67, 97, 238, 0.4);
    }

    .shortcut i {
        font-size: 14px;
    }

    /* SEÇÃO DE PLATAFORMAS - MAIS REDUZIDA */
    .ai-platforms {
        animation: fadeInUp 0.6s ease-out 0.3s both;
    }

    .models-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-color);
    }

    .models-header h2 {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .models-header button {
        color: #00dbde;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: var(--radius-full);
        background: rgba(0, 219, 222, 0.08);
        border: 1px solid rgba(0, 219, 222, 0.15);
        background: none;
        border: none;
        font-family: inherit;
        font-size: inherit;
    }

    .models-header button:hover {
        color: var(--text-primary);
        background: rgba(0, 219, 222, 0.2);
        transform: translateX(4px);
    }

    /* CARROSSEL DE PLATAFORMAS - MAIS REDUZIDO */
    .platforms-carousel-container {
        position: relative;
        margin-bottom: 35px;
    }

    .platforms-carousel {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        gap: 16px;
        padding: 10px 6px 15px;
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 219, 222, 0.4) transparent;
    }

    .platforms-carousel::-webkit-scrollbar {
        height: 5px;
    }

    .platforms-carousel::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.04);
        border-radius: 8px;
    }

    .platforms-carousel::-webkit-scrollbar-thumb {
        background: rgba(0, 219, 222, 0.4);
        border-radius: 8px;
    }

    .platform-card {
        flex: 0 0 auto;
        width: 180px;
        background: var(--card-bg);
        border-radius: 16px;
        padding: 16px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 1.5px solid rgba(255, 255, 255, 0.04);
        text-decoration: none;
        color: inherit;
        display: block;
        position: relative;
        overflow: hidden;
    }

    .platform-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: var(--shadow-hover);
        border-color: rgba(0, 219, 222, 0.25);
    }

    .platform-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
    }

    /* ÍCONES DAS PLATAFORMAS - MAIS REDUZIDOS */
    .platform-icon {
        font-size: 20px;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }

    .platform-card.chatgpt .platform-icon {
        background: rgba(16, 163, 127, 0.12);
        color: #10a37f;
        border: 1.5px solid rgba(16, 163, 127, 0.25);
    }

    .platform-card.deepseek .platform-icon {
        background: rgba(123, 97, 255, 0.12);
        color: #7c3aed;
        border: 1.5px solid rgba(123, 97, 255, 0.25);
    }

    .platform-card.gemini .platform-icon {
        background: rgba(66, 133, 244, 0.12);
        color: #4285f4;
        border: 1.5px solid rgba(66, 133, 244, 0.25);
    }

    .platform-card.claude .platform-icon {
        background: rgba(217, 119, 6, 0.12);
        color: #d97706;
        border: 1.5px solid rgba(217, 119, 6, 0.25);
    }

    .platform-card.copilot .platform-icon {
        background: rgba(0, 120, 212, 0.12);
        color: #0078d4;
        border: 1.5px solid rgba(0, 120, 212, 0.25);
    }

    .platform-card.google-ai .platform-icon {
        background: rgba(234, 67, 53, 0.12);
        color: #ea4335;
        border: 1.5px solid rgba(234, 67, 53, 0.25);
    }

    .platform-card.perplexity .platform-icon {
        background: rgba(13, 148, 136, 0.12);
        color: #0d9488;
        border: 1.5px solid rgba(13, 148, 136, 0.25);
    }

    .platform-card.midjourney .platform-icon {
        background: rgba(30, 41, 59, 0.12);
        color: #475569;
        border: 1.5px solid rgba(30, 41, 59, 0.25);
    }

    .platform-card h3 {
        font-size: 15px;
        margin-bottom: 6px;
        color: var(--text-primary);
        font-weight: 700;
        line-height: 1.3;
    }

    .platform-card p {
        font-size: 12px;
        color: var(--text-secondary);
        line-height: 1.4;
        margin-bottom: 14px;
        min-height: 34px;
    }

    .platform-tag {
        display: inline-block;
        padding: 4px 10px;
        background: rgba(67, 97, 238, 0.15);
        border-radius: var(--radius-full);
        font-size: 11px;
        color: #4cc9f0;
        font-weight: 600;
        border: 1px solid rgba(76, 201, 240, 0.25);
    }

    /* NAVEGAÇÃO DO CARROSSEL - REDUZIDA */
    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.3);
        border: 1.5px solid rgba(255, 255, 255, 0.15);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: var(--text-primary);
        transition: var(--transition);
        z-index: 10;
        backdrop-filter: blur(10px);
        opacity: 0.7;
        border: none;
    }

    .carousel-nav:hover {
        background: rgba(0, 219, 222, 0.25);
        border-color: rgba(0, 219, 222, 0.5);
        color: var(--text-primary);
        transform: translateY(-50%) scale(1.08);
        opacity: 1;
    }

    .carousel-nav.prev {
        left: -20px;
    }

    .carousel-nav.next {
        right: -20px;
    }

    /* INDICADORES DO CARROSSEL - REDUZIDOS */
    .carousel-indicators {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 15px;
    }

    .carousel-indicator {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        border: none;
        cursor: pointer;
        transition: var(--transition);
        padding: 0;
    }

    .carousel-indicator.active {
        background: #00dbde;
        transform: scale(1.2);
        box-shadow: 0 0 8px rgba(0, 219, 222, 0.4);
    }

    /* FOOTER - MAIS REDUZIDO */
    .footer {
        margin-top: 35px;
        text-align: center;
        padding-top: 18px;
        border-top: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 13px;
        animation: fadeInUp 0.6s ease-out 0.4s both;
    }

    .footer a {
        color: #00dbde;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        padding: 0 5px;
    }

    .footer a:hover {
        color: #fc00ff;
        text-decoration: underline;
    }

    .footer .social-links {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 10px 0;
    }

    .footer .social-links a {
        font-size: 14px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.04);
        transition: var(--transition);
    }

    .footer .social-links a:hover {
        background: rgba(0, 219, 222, 0.15);
        transform: translateY(-2px);
    }

    /* NOTIFICAÇÕES - REDUZIDAS */
    .notification {
        position: fixed;
        top: 15px;
        right: 15px;
        background: var(--card-bg);
        color: var(--text-primary);
        padding: 14px 16px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        border-left: 4px solid #f72585;
        z-index: 1000;
        animation: slideInRight 0.5s ease;
        max-width: 320px;
        display: flex;
        align-items: center;
        gap: 10px;
        backdrop-filter: blur(10px);
        border: 1px solid var(--border-color);
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    .notification.fade-out {
        animation: slideOutRight 0.5s ease forwards;
    }

    .notification-icon {
        font-size: 18px;
        color: #00dbde;
    }

    .notification-content {
        flex: 1;
    }

    .notification-title {
        font-weight: 700;
        margin-bottom: 4px;
        color: var(--text-primary);
        font-size: 13px;
    }

    .notification-message {
        font-size: 12px;
        color: var(--text-secondary);
        line-height: 1.4;
    }

    .notification-close {
        background: none;
        border: none;
        color: var(--text-muted);
        font-size: 14px;
        cursor: pointer;
        transition: var(--transition);
        padding: 4px;
    }

    .notification-close:hover {
        color: var(--text-primary);
    }

    /* MODAL - REDUZIDO */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
        backdrop-filter: blur(5px);
    }

    .modal.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-content {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 25px;
        max-width: 450px;
        width: 90%;
        box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        border: 1px solid var(--border-color);
        transform: translateY(-25px);
        transition: var(--transition);
        position: relative;
    }

    .modal.active .modal-content {
        transform: translateY(0);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 700;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .modal-close {
        background: none;
        border: none;
        color: var(--text-muted);
        font-size: 18px;
        cursor: pointer;
        transition: var(--transition);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        color: var(--text-primary);
        background: rgba(255, 255, 255, 0.08);
    }

    .modal-body {
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 13.5px;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    /* LOADER - REDUZIDO */
    .loader {
        display: inline-block;
        width: 14px;
        height: 14px;
        border: 2px solid rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        border-top-color: #00dbde;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* CHAT INTERFACE COMPACTA - REDUZIDA */
    .chat-fullscreen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: var(--dark-bg);
        z-index: 2000;
        display: none;
        flex-direction: column;
        overflow: hidden;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .chat-fullscreen.active {
        display: flex;
        opacity: 1;
    }

    .chat-fullscreen .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        padding: 12px;
    }

    .chat-fullscreen .header {
        margin-bottom: 12px;
        animation: none;
        flex-shrink: 0;
    }

    .chat-fullscreen .main-chat-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        background: var(--card-bg);
        border-radius: 18px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow);
    }

    .chat-fullscreen .input-box {
        margin: 0;
        border-radius: 0;
        border-left: none;
        border-right: none;
        border-bottom: none;
        border-top: 1px solid var(--border-color);
        flex-shrink: 0;
        padding: 12px;
    }

    .chat-fullscreen .input-box::before {
        display: none;
    }

    .chat-fullscreen .chat-messages-area {
        flex: 1;
        overflow-y: auto;
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        background: linear-gradient(135deg, rgba(26, 26, 46, 0.6), rgba(15, 52, 96, 0.6));
    }

    .chat-message {
        display: flex;
        gap: 10px;
        max-width: 750px;
        width: 100%;
        margin: 0 auto;
        animation: fadeInMessage 0.3s ease;
    }

    @keyframes fadeInMessage {
        from {
            opacity: 0;
            transform: translateY(8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .chat-message.user-message {
        flex-direction: row-reverse;
    }

    .chat-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .user-message .chat-avatar {
        background: var(--accent-gradient);
    }

    .chat-content {
        background: rgba(255, 255, 255, 0.06);
        border-radius: 16px;
        padding: 12px;
        flex: 1;
        border: 1px solid rgba(255, 255, 255, 0.04);
        max-width: 87%;
    }

    .user-message .chat-content {
        background: rgba(67, 97, 238, 0.12);
        border-color: rgba(67, 97, 238, 0.15);
    }

    .chat-sender {
        font-weight: 700;
        margin-bottom: 5px;
        color: var(--text-primary);
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .user-message .chat-sender {
        color: #4cc9f0;
        justify-content: flex-end;
    }

    .chat-text {
        color: var(--text-secondary);
        line-height: 1.5;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .chat-time {
        font-size: 10px;
        color: var(--text-muted);
        text-align: right;
        font-style: italic;
    }

    .user-message .chat-time {
        text-align: left;
    }

    .typing-indicator {
        display: inline-flex;
        gap: 3px;
        align-items: center;
        padding: 4px 8px;
        background: rgba(0, 219, 222, 0.08);
        border-radius: 18px;
        margin-left: 8px;
    }

    .typing-dot {
        width: 6px;
        height: 6px;
        background: #00dbde;
        border-radius: 50%;
        animation: typingBounce 1.4s infinite ease-in-out;
    }

    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
    .typing-dot:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typingBounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(0.8); }
    }

    .chat-fullscreen-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 16px;
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        border-radius: 18px 18px 0 0;
    }

    .chat-fullscreen-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chat-fullscreen-title i {
        font-size: 20px;
        color: #00dbde;
    }

    .chat-fullscreen-title h2 {
        font-size: 18px;
        background: linear-gradient(to right, #ffffff, #a8edea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
    }

    .chat-fullscreen-controls {
        display: flex;
        gap: 6px;
    }

    .chat-control-btn {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        width: 34px;
        height: 34px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 13.5px;
    }

    .chat-control-btn:hover {
        background: rgba(0, 219, 222, 0.15);
        transform: translateY(-1px);
    }

    /* Estilos para notificações */
    .notification-success {
        border-left-color: #10a37f !important;
    }
    
    .notification-success .notification-icon {
        color: #10a37f !important;
    }
    
    .notification-info {
        border-left-color: #00dbde !important;
    }
    
    .notification-info .notification-icon {
        color: #00dbde !important;
    }
    
    .notification-warning {
        border-left-color: #f59e0b !important;
    }
    
    .notification-warning .notification-icon {
        color: #f59e0b !important;
    }
    
    .notification-error {
        border-left-color: #f72585 !important;
    }
    
    .notification-error .notification-icon {
        color: #f72585 !important;
    }

    /* Sidebar Overlay */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 999;
        display: none;
    }

    /* TEMAS CLARO/ESCURO - NOVO */
    body.light-theme {
        --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        --secondary-gradient: linear-gradient(135deg, #4cc9f0 0%, #4895ef 100%);
        --accent-gradient: linear-gradient(135deg, #00dbde 0%, #fc00ff 100%);
        --danger-gradient: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
        --dark-bg: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        --card-bg: linear-gradient(145deg, #ffffff, #f1f5f9);
        --sidebar-bg: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        --text-primary: #1e293b;
        --text-secondary: #475569;
        --text-muted: #64748b;
        --border-color: rgba(0, 0, 0, 0.1);
        --shadow: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-hover: 0 15px 30px rgba(0,0,0,0.12);
    }

    /* Ajustes para o tema claro */
    body.light-theme .sidebar {
        border-right: 1px solid rgba(0, 0, 0, 0.08);
    }

    body.light-theme .input-box {
        background: var(--card-bg);
        border: 1px solid rgba(0, 0, 0, 0.08);
    }

    body.light-theme .chat-content {
        background: rgba(0, 0, 0, 0.03);
    }

    body.light-theme .user-message .chat-content {
        background: rgba(67, 97, 238, 0.08);
    }

    body.light-theme .notification {
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.08);
    }

    /* RESPONSIVIDADE - ATUALIZADA PARA DIMENSÕES REDUZIDAS */
    @media (max-width: 1200px) {
        .container {
            max-width: 100%;
            padding: 22px 18px;
        }
        
        .carousel-nav {
            display: none;
        }
        
        .chat-fullscreen .container {
            padding: 10px;
        }
    }

    @media (max-width: 992px) {
        .header h1 {
            font-size: 20px;
        }
        
        .header .icon {
            font-size: 28px;
        }
        
        .platform-card {
            width: 160px;
        }
        
        .input-actions {
            justify-content: space-between;
        }
        
        .chat-fullscreen .header h1 {
            font-size: 18px;
        }
        
        .chat-message {
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }
        
        .sidebar.open {
            transform: translateX(0);
        }
        
        .sidebar-toggle {
            display: flex;
        }
        
        /* Mostrar botão de fechar no mobile */
        .sidebar-close-btn {
            display: flex;
        }
        
        .main-content {
            margin-left: 0;
            width: 100%;
        }
        
        .header {
            text-align: left;
            padding-right: 100px;
        }
        
        .header-controls {
            position: absolute;
            top: 0;
            right: 0;
            transform: none;
        }
        
        .features-panel {
            position: fixed;
            top: 60px;
            right: 10px;
            left: 10px;
            width: auto;
            z-index: 1100;
        }
        
        .features-panel::before {
            right: auto;
            left: 20px;
        }
        
        .header h1 {
            font-size: 18px;
        }
        
        .header .icon {
            font-size: 26px;
        }
        
        .header p {
            font-size: 12.5px;
        }
        
        .models-header {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }
        
        .models-header h2 {
            font-size: 18px;
        }
        
        .platform-card {
            width: 145px;
            padding: 14px;
        }
        
        .platform-card h3 {
            font-size: 14px;
        }
        
        .shortcut {
            min-width: 120px;
            padding: 9px 14px;
            font-size: 12.5px;
        }
        
        .btn {
            padding: 9px 16px;
            min-width: 95px;
            font-size: 12.5px;
        }
        
        .btn-round {
            width: 38px;
            height: 38px;
            font-size: 14px;
        }
        
        .theme-btn,
        .features-btn {
            width: 36px; /* Ajustado para mobile */
            height: 36px;
            font-size: 15px;
        }
        
        .chat-fullscreen-header {
            padding: 9px 14px;
        }
        
        .chat-fullscreen-title h2 {
            font-size: 16px;
        }
        
        .chat-control-btn {
            width: 32px;
            height: 32px;
            font-size: 12.5px;
        }
        
        .chat-messages-area {
            padding: 14px;
        }
        
        .chat-avatar {
            width: 30px;
            height: 30px;
            font-size: 13px;
        }
        
        .chat-content {
            padding: 10px;
            max-width: 92%;
        }
        
        .font-btn {
            padding: 5px 8px;
            font-size: 11px;
            min-height: 30px;
        }
    }

    @media (max-width: 576px) {
        .container {
            padding: 18px 12px;
        }
        
        .header h1 {
            font-size: 17px;
        }
        
        .header .icon {
            font-size: 24px;
        }
        
        .input-box {
            padding: 12px;
            gap: 10px;
        }
        
        .input-box input {
            font-size: 13.5px;
            padding: 7px 0;
            min-height: 34px;
        }
        
        .input-actions-left, .input-actions-right {
            gap: 6px;
        }
        
        .btn-round {
            width: 36px;
            height: 36px;
            font-size: 13px;
        }
        
        .theme-btn,
        .features-btn {
            width: 34px; /* Ajustado para telas pequenas */
            height: 34px;
            font-size: 14px;
        }
        
        .btn-tooltip {
            font-size: 10px;
            padding: 4px 8px;
            bottom: -32px;
        }
        
        .shortcuts {
            gap: 8px;
        }
        
        .shortcut {
            min-width: 105px;
            padding: 7px 12px;
            font-size: 12px;
        }
        
        .platform-card {
            width: 130px;
            padding: 12px;
        }
        
        .platform-card h3 {
            font-size: 13px;
        }
        
        .platform-card p {
            font-size: 11px;
        }
        
        .modal-content {
            padding: 20px 14px;
            width: 95%;
        }
        
        .notification {
            max-width: calc(100% - 30px);
            right: 15px;
            left: 15px;
        }
        
        .chat-fullscreen .header {
            margin-bottom: 10px;
        }
        
        .chat-fullscreen .header h1 {
            font-size: 16px;
        }
        
        .chat-fullscreen .header p {
            font-size: 12px;
        }
        
        .chat-message {
            gap: 6px;
        }
        
        .chat-text {
            font-size: 12.5px;
        }
        
        .chat-fullscreen .input-actions-left,
        .chat-fullscreen .input-actions-right {
            gap: 5px;
        }
        
        .font-controls {
            gap: 4px;
        }
        
        .font-btn {
            padding: 4px 6px;
            font-size: 10.5px;
            min-height: 28px;
        }
    }

    /* ANIMAÇÕES ADICIONAIS */
    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 1;
        }
        100% {
            transform: scale(3.5);
            opacity: 0;
        }
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.25);
        transform: scale(0);
        animation: ripple 0.5s linear;
        pointer-events: none;
    }

    /* EFEITO DE BRILHO NOS CARDS - REDUZIDO */
    .platform-card::after {
        content: '';
        position: absolute;
        top: -1.5px;
        left: -1.5px;
        right: -1.5px;
        bottom: -1.5px;
        background: linear-gradient(45deg, #00dbde, #fc00ff, #00dbde);
        z-index: -1;
        border-radius: 18px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .platform-card:hover::after {
        opacity: 0.2;
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        0% {
            filter: hue-rotate(0deg);
        }
        100% {
            filter: hue-rotate(360deg);
        }
    }
</style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <!-- NOVO: Botão de fechar sidebar no topo -->
        <button class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Fechar sidebar">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <div class="icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h1>Reelmi AI</h1>
            </div>
            <p style="color: var(--text-muted); font-size: 13px; line-height: 1.4;">Universal Intelligence Interface</p>
        </div>
        
        <div class="sidebar-menu">
            <div class="sidebar-menu-section">
                <h3>Principal</h3>
                <a href="#" class="sidebar-menu-item active" id="chatInteligenteBtn">
                    <i class="fas fa-comment-dots"></i>
                    <span>Chat Inteligente</span>
                </a>
                <a href="#" class="sidebar-menu-item" id="newChatBtn">
                    <i class="fas fa-plus-circle"></i>
                    <span>Novo Chat</span>
                    <span class="badge">Novo</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-bolt"></i>
                    <span>Atalhos Rápidos</span>
                </a>
            </div>
            
            <div class="sidebar-menu-section">
                <h3>Plataformas</h3>
                <a href="#" class="sidebar-menu-item">
                    <i class="fab fa-openai"></i>
                    <span>ChatGPT</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-brain"></i>
                    <span>DeepSeek</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-gem"></i>
                    <span>Google Gemini</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-leaf"></i>
                    <span>Claude AI</span>
                </a>
            </div>
            
            <div class="sidebar-menu-section">
                <h3>Ferramentas</h3>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-image"></i>
                    <span>Gerador de Imagens</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-code"></i>
                    <span>Assistente de Código</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-file-alt"></i>
                    <span>Análise de Documentos</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Análise de Dados</span>
                </a>
            </div>
            
            <div class="sidebar-menu-section">
                <h3>Configurações</h3>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-user-cog"></i>
                    <span>Perfil</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-cog"></i>
                    <span>Configurações</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Privacidade</span>
                </a>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-question-circle"></i>
                    <span>Ajuda & Suporte</span>
                </a>
            </div>
        </div>
        
        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-info">
                    <h4>Usuário Reelmi</h4>
                    <p>Plano Premium</p>
                </div>
            </div>
            
            <!-- REMOVIDOS OS BOTÕES DE TEMA E SAIR -->
        </div>
    </div>
    
    <!-- BOTÃO TOGGLE PARA SIDEBAR (MOBILE) -->
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Alternar sidebar">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- OVERLAY PARA MOBILE -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="main-content" id="mainContent">
        <!-- MODAL DE CONFIRMAÇÃO -->
        <div class="modal" id="confirmationModal" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Abrir todas as plataformas</h2>
                    <button class="modal-close" id="modalClose" aria-label="Fechar modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Você está prestes a abrir <strong>8 plataformas de IA</strong> em novas abas do navegador.</p>
                    <p>Isso pode afetar o desempenho do seu navegador se você tiver muitas abas abertas.</p>
                    <p>Tem certeza que deseja continuar?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="modalCancel">Cancelar</button>
                    <button class="btn btn-accent" id="modalConfirm">Abrir todas</button>
                </div>
            </div>
        </div>

        <!-- CHAT FULLSCREEN (COMPACTO) -->
        <div class="chat-fullscreen" id="chatFullscreen">
            <div class="container">
                <div class="chat-fullscreen-header">
                    <div class="chat-fullscreen-title">
                        <i class="fas fa-robot"></i>
                        <h2 id="chatFullscreenTitle">Reelmi AI Chat</h2>
                    </div>
                    <div class="chat-fullscreen-controls">
                        <button class="chat-control-btn" id="clearFullscreenChat" title="Limpar conversa">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="chat-control-btn" id="closeFullscreenChat" title="Fechar chat">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <div class="main-chat-container">
                    <div class="chat-messages-area" id="chatMessagesArea">
                        <!-- Mensagens de exemplo -->
                        <div class="chat-message ai-message">
                            <div class="chat-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="chat-content">
                                <div class="chat-sender">
                                    Reelmi AI
                                    <div class="typing-indicator" id="typingIndicator" style="display: none;">
                                        <div class="typing-dot"></div>
                                        <div class="typing-dot"></div>
                                        <div class="typing-dot"></div>
                                    </div>
                                </div>
                                <div class="chat-text" id="welcomeMessage">
                                    Olá! Eu sou o Reelmi AI, especialista em ventilação mecânica e neonatologia. Como posso ajudar você hoje? Pode me fazer perguntas sobre ventilação mecânica, CPAP, PEEP, cuidados neonatais e muito mais!
                                </div>
                                <div class="chat-time">Agora</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- INPUT BOX COMPACTA COM BOTÕES REDONDOS -->
                    <section class="input-box" id="fullscreenInputSection" aria-label="Área de entrada de mensagens">
                        <input type="text" 
                               id="fullscreenChatInput"
                               placeholder="Digite sua pergunta sobre ventilação mecânica ou neonatologia..."
                               aria-label="Digite sua mensagem"
                               autocomplete="off">
                        <div class="input-actions">
                            <div class="input-actions-left">
                                <button class="btn-round btn-round-primary" id="fullscreenWriteBtn" aria-label="Modo escrita">
                                    <i class="fas fa-pen"></i>
                                    <span class="btn-tooltip">Escrever</span>
                                </button>
                                <button class="btn-round btn-round-secondary" id="fullscreenSearchBtn" aria-label="Pesquisar">
                                    <i class="fas fa-search"></i>
                                    <span class="btn-tooltip">Pesquisar</span>
                                </button>
                                <button class="btn-round btn-round-danger" id="fullscreenFileBtn" aria-label="Anexar arquivo">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="btn-tooltip">Anexar Arquivo</span>
                                </button>
                            </div>
                            <div class="input-actions-right">
                                <!-- NOVO: Botão de enviar adicionado -->
                                <button class="btn-round btn-round-send" id="fullscreenSendBtn" aria-label="Enviar mensagem">
                                    <i class="fas fa-paper-plane"></i>
                                    <span class="btn-tooltip">Enviar</span>
                                </button>
                                <button class="btn-round btn-round-accent" id="fullscreenVoiceBtn" aria-label="Ativar voz">
                                    <i class="fas fa-headphones"></i>
                                    <span class="btn-tooltip">Ativar Voz</span>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- DASHBOARD PRINCIPAL -->
        <div class="container" id="mainContainer">
            <!-- HEADER - MAIS COMPACTO -->
            <header class="header" role="banner">
                <div class="icon" aria-hidden="true">
                    <i class="fas fa-robot" id="headerIcon"></i>
                </div>
                <h1 id="greeting">Boa noite, como posso ajudar?</h1>
                <p id="headerDescription">Especialista em ventilação mecânica e neonatologia. Em que posso ser útil?</p>
                
                <!-- BOTÕES DE CONTROLE NO HEADER - MODIFICADO E REDUZIDOS -->
                <div class="header-controls">
                    <!-- BOTÃO DE TEMA - REDUZIDO -->
                    <button class="theme-btn" id="themeBtn" aria-label="Alternar tema claro/escuro">
                        <i class="fas fa-moon"></i>
                        <span class="btn-tooltip">Tema Escuro</span>
                    </button>
                    
                    <!-- BOTÃO DE FUNCIONALIDADES - REDUZIDO -->
                    <button class="features-btn" id="featuresBtn" aria-label="Funcionalidades">
                        <i class="fas fa-sliders-h"></i>
                        <span class="btn-tooltip">Funcionalidades</span>
                    </button>
                    
                    <!-- PAINEL DE FUNCIONALIDADES -->
                    <div class="features-panel" id="featuresPanel">
                        <h3><i class="fas fa-cog"></i> Funcionalidades</h3>
                        
                        <!-- CONTROLES DE FONTE - NOVO -->
                        <div class="font-controls">
                            <button class="font-btn font-decrease" id="fontDecreaseBtn" aria-label="Diminuir tamanho da fonte">
                                <i class="fas fa-font"></i> A-
                            </button>
                            <button class="font-btn font-reset" id="fontResetBtn" aria-label="Tamanho de fonte padrão">
                                <i class="fas fa-undo"></i> Padrão
                            </button>
                            <button class="font-btn font-increase" id="fontIncreaseBtn" aria-label="Aumentar tamanho da fonte">
                                <i class="fas fa-font"></i> A+
                            </button>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item" id="heyReelmiToggle">
                                <i class="fas fa-microphone"></i>
                                <div class="feature-text">Ativar "Hey Reelmi"</div>
                                <div class="toggle-switch"></div>
                            </div>
                            
                            <a href="#" class="feature-item" id="sendImageBtn">
                                <i class="fas fa-image"></i>
                                <div class="feature-text">Enviar Imagem</div>
                                <div class="feature-badge">Novo</div>
                            </a>
                            
                            <a href="#" class="feature-item" id="securityAlertsBtn">
                                <i class="fas fa-shield-alt"></i>
                                <div class="feature-text">Avisos de Segurança</div>
                                <div class="feature-badge">ON</div>
                            </a>
                            
                            <a href="#" class="feature-item" id="recommendationsBtn">
                                <i class="fas fa-star"></i>
                                <div class="feature-text">Recomendações</div>
                            </a>
                            
                            <a href="#" class="feature-item" id="clearChatBtn">
                                <i class="fas fa-trash-alt"></i>
                                <div class="feature-text">Limpar Chat</div>
                            </a>
                            
                            <a href="#" class="feature-item" id="darkModeToggle">
                                <i class="fas fa-moon"></i>
                                <div class="feature-text">Modo Escuro</div>
                                <div class="toggle-switch active"></div>
                            </a>
                            
                            <a href="#" class="feature-item" id="voiceSettingsBtn">
                                <i class="fas fa-volume-up"></i>
                                <div class="feature-text">Configurações de Voz</div>
                            </a>
                            
                            <a href="#" class="feature-item" id="aboutBtn">
                                <i class="fas fa-info-circle"></i>
                                <div class="feature-text">Sobre</div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <main role="main">
                <!-- ÁREA DE ENTRADA COM BOTÕES REDONDOS -->
                <section class="input-box" id="inputSection" aria-label="Área de entrada de mensagens">
                    <input type="text" 
                           id="chatInput"
                           placeholder="Digite sua pergunta sobre ventilação mecânica ou neonatologia..."
                           aria-label="Digite sua mensagem"
                           autocomplete="off">
                    <div class="input-actions">
                        <div class="input-actions-left">
                            <button class="btn-round btn-round-primary" id="writeBtn" aria-label="Modo escrita">
                                <i class="fas fa-pen"></i>
                                <span class="btn-tooltip">Escrever</span>
                            </button>
                            <button class="btn-round btn-round-secondary" id="searchBtn" aria-label="Pesquisar">
                                <i class="fas fa-search"></i>
                                <span class="btn-tooltip">Pesquisar</span>
                            </button>
                            <button class="btn-round btn-round-danger" id="fileBtn" aria-label="Anexar arquivo">
                                <i class="fas fa-paperclip"></i>
                                <span class="btn-tooltip">Anexar Arquivo</span>
                            </button>
                        </div>
                        <div class="input-actions-right">
                            <!-- NOVO: Botão de enviar adicionado -->
                            <button class="btn-round btn-round-send" id="sendBtn" aria-label="Enviar mensagem">
                                <i class="fas fa-paper-plane"></i>
                                <span class="btn-tooltip">Enviar</span>
                            </button>
                            <button class="btn-round btn-round-accent" id="voiceBtn" aria-label="Ativar voz">
                                <i class="fas fa-headphones"></i>
                                <span class="btn-tooltip">Ativar Voz</span>
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ATALHOS RÁPIDOS -->
                <section class="shortcuts-section" aria-labelledby="shortcutsTitle">
                    <h2 id="shortcutsTitle" class="visually-hidden">Atalhos rápidos</h2>
                    <div class="shortcuts">
                        <button class="shortcut" data-action="ventilacao" aria-label="Perguntas sobre ventilação">
                            <i class="fas fa-lungs"></i> Ventilação
                        </button>
                        <button class="shortcut" data-action="neonatologia" aria-label="Perguntas sobre neonatologia">
                            <i class="fas fa-baby"></i> Neonatologia
                        </button>
                        <button class="shortcut" data-action="cpap" aria-label="Informações sobre CPAP">
                            <i class="fas fa-wind"></i> CPAP
                        </button>
                        <button class="shortcut" data-action="peep" aria-label="Informações sobre PEEP">
                            <i class="fas fa-compress-arrows-alt"></i> PEEP
                        </button>
                        <button class="shortcut" data-action="oxigenio" aria-label="Uso de oxigênio">
                            <i class="fas fa-atom"></i> Oxigênio
                        </button>
                    </div>
                </section>

                <!-- PLATAFORMAS DE IA -->
                <section class="ai-platforms" aria-labelledby="platformsTitle">
                    <div class="models-header">
                        <h2 id="platformsTitle">Plataformas de IA Disponíveis</h2>
                        <button id="openAllPlatforms" aria-label="Abrir todas as plataformas">
                            <i class="fas fa-external-link-alt"></i> Acessar diretamente
                        </button>
                    </div>

                    <div class="platforms-carousel-container">
                        <button class="carousel-nav prev" aria-label="Plataformas anteriores">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        
                        <div class="platforms-carousel" id="platformsCarousel" aria-live="polite">
                            <!-- ChatGPT -->
                            <a href="https://chat.openai.com" target="_blank" class="platform-card chatgpt" aria-label="ChatGPT - IA conversacional da OpenAI">
                                <div class="platform-icon">
                                    <i class="fab fa-openai"></i>
                                </div>
                                <h3>ChatGPT</h3>
                                <p>IA conversacional avançada com capacidade multimídia</p>
                                <span class="platform-tag">Popular</span>
                            </a>

                            <!-- DeepSeek -->
                            <a href="https://chat.deepseek.com" target="_blank" class="platform-card deepseek" aria-label="DeepSeek - Assistente gratuito avançado">
                                <div class="platform-icon">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <h3>DeepSeek</h3>
                                <p>Assistente gratuito com contexto de 128K tokens</p>
                                <span class="platform-tag">Gratuito</span>
                            </a>

                            <!-- Google Gemini -->
                            <a href="https://gemini.google.com" target="_blank" class="platform-card gemini" aria-label="Google Gemini - IA multimodal com pesquisa">
                                <div class="platform-icon">
                                    <i class="fas fa-gem"></i>
                                </div>
                                <h3>Google Gemini</h3>
                                <p>Multimodal integrado com busca do Google</p>
                                <span class="platform-tag">Google</span>
                            </a>

                            <!-- Claude AI -->
                            <a href="https://claude.ai" target="_blank" class="platform-card claude" aria-label="Claude AI - Focado em segurança e ética">
                                <div class="platform-icon">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <h3>Claude AI</h3>
                                <p>Focado em segurança, ética e contexto extenso</p>
                                <span class="platform-tag">Ético</span>
                            </a>

                            <!-- Microsoft Copilot -->
                            <a href="https://copilot.microsoft.com" target="_blank" class="platform-card copilot" aria-label="Microsoft Copilot - Integrado com Bing">
                                <div class="platform-icon">
                                    <i class="fas fa-wind"></i>
                                </div>
                                <h3>Microsoft Copilot</h3>
                                <p>Integrado com Bing e suíte Office</p>
                                <span class="platform-tag">Microsoft</span>
                            </a>

                            <!-- Google AI -->
                            <a href="https://ai.google" target="_blank" class="platform-card google-ai" aria-label="Google AI - Plataforma experimental">
                                <div class="platform-icon">
                                    <i class="fab fa-google"></i>
                                </div>
                                <h3>Google AI</h3>
                                <p>Plataforma experimental com modelos de ponta</p>
                                <span class="platform-tag">Experimentos</span>
                            </a>

                            <!-- Perplexity -->
                            <a href="https://www.perplexity.ai" target="_blank" class="platform-card perplexity" aria-label="Perplexity - IA com fontes citadas">
                                <div class="platform-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h3>Perplexity</h3>
                                <p>IA de pesquisa com fontes citadas em tempo real</p>
                                <span class="platform-tag">Pesquisa</span>
                            </a>

                            <!-- Midjourney -->
                            <a href="https://www.midjourney.com" target="_blank" class="platform-card midjourney" aria-label="Midjourney - Geração de imagens artísticas">
                                <div class="platform-icon">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <h3>Midjourney</h3>
                                <p>Geração de imagens artísticas de alta qualidade</p>
                                <span class="platform-tag">Imagens</span>
                            </a>
                        </div>
                        
                        <button class="carousel-nav next" aria-label="Próximas plataformas">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        
                        <div class="carousel-indicators" role="tablist" aria-label="Indicadores do carrossel">
                            <button class="carousel-indicator active" role="tab" aria-selected="true" aria-label="Slide 1"></button>
                            <button class="carousel-indicator" role="tab" aria-selected="false" aria-label="Slide 2"></button>
                            <button class="carousel-indicator" role="tab" aria-selected="false" aria-label="Slide 3"></button>
                        </div>
                    </div>
                </section>
            </main>

            <!-- FOOTER -->
            <footer class="footer" role="contentinfo">
                <div class="social-links">
                    <a href="#" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" aria-label="Discord">
                        <i class="fab fa-discord"></i>
                    </a>
                </div>
                <p>Interface desenvolvida com <i class="fas fa-heart" style="color:#f72585;"></i> | 
                   <a href="#" aria-label="Política de privacidade">Privacidade</a> • 
                   <a href="#" aria-label="Termos de uso">Termos</a> • 
                   <a href="#" aria-label="Ajuda">Ajuda</a> • 
                   <a href="#" aria-label="Contato">Contato</a></p>
                <p style="margin-top: 12px; font-size: 12px; color: var(--text-muted);">
                    © 2024 Reelmi AI. Todos os direitos reservados. 
                    <span style="display: block; margin-top: 4px; font-size: 11.5px;">
                        Especialista em ventilação mecânica e neonatologia.
                    </span>
                </p>
            </footer>
        </div>
    </div>

    <script>
    // APLICAÇÃO PRINCIPAL COMPLETA COM VOZ "HEY REELMI"
    class AIChatInterface {
        constructor() {
            this.elements = {};
            this.state = {
                voiceActive: false,
                fullscreenVoiceActive: false,
                currentPlatformPage: 0,
                typingEffect: null,
                notifications: [],
                sidebarOpen: window.innerWidth > 768,
                chatMessages: [],
                fullscreenChatMessages: [],
                featuresPanelOpen: false,
                heyReelmiActive: false,
                darkModeActive: true,
                currentTheme: 'dark',
                fontSize: 100,
                minFontSize: 80,
                maxFontSize: 150,
                isListening: false,
                recognition: null,
                speechSynthesis: window.speechSynthesis,
                heyReelmiCommand: "hey reelmi",
                isWaitingForCommand: false,
                speechActive: false,
                voicesLoaded: false,
                availableVoices: [],
                currentVoice: null
            };
            
            this.platforms = [
                'https://chat.openai.com',
                'https://chat.deepseek.com',
                'https://gemini.google.com',
                'https://claude.ai',
                'https://copilot.microsoft.com',
                'https://ai.google',
                'https://www.perplexity.ai',
                'https://www.midjourney.com'
            ];
            
            // PERGUNTAS ESPECIALIZADAS EM VENTILAÇÃO MECÂNICA E NEONATOLOGIA
            this.placeholderPhrases = [
                "Pergunte sobre ventilação mecânica...",
                "O que é CPAP?",
                "Quando usar ventilação não invasiva?",
                "O que é FiO2?",
                "Como monitorar um paciente em ventilação mecânica?",
                "O que é PEEP?",
                "Quais as complicações da ventilação mecânica?",
                "O que é suporte ventilatório avançado?",
                "Quando é necessário usar oxigênio em neonatal?",
                "O que é síndrome do desconforto respiratório agudo?"
            ];
            
            // PERGUNTAS E RESPOSTAS ESPECIALIZADAS
            this.perguntas = [
                // Perguntas originais de ventilação mecânica
                "o que é ventilação mecânica?",
                "quais os tipos de ventilação mecânica?",
                "o que é cpap?",
                "quando usar ventilação não invasiva?",
                "o que é fi02?",
                "como monitorar um paciente em ventilação mecânica?",
                "o que é peep?",
                "quais as complicações da ventilação mecânica?",
                "como fazer o desmame da ventilação mecânica?",
                "o que é síndrome do desconforto respiratório agudo?",
                
                // NOVAS PERGUNTAS SOBRE NEONATOLOGIA
                "o que é suporte ventilatório avançado",
                "quando é necessário usar oxigênio em neonatal",
                "o que é suporte ventilatório invasivo",
                "quando deve ser usado insuflação no neonatal",
                
                // Adicionando umas genéricas para os botões novos funcionarem
                "criar um código em python",
                "escrever um e-mail formal",
                "gerar uma imagem futurista",
                "resumir este texto"
            ];

            // LISTA DE RESPOSTAS ESPECIALIZADAS
            this.respostas = [
                // Respostas originais de ventilação mecânica
                "Ventilação mecânica é o suporte artificial à respiração, utilizado quando o paciente não consegue respirar adequadamente por conta própria.",
                "Existem dois tipos principais: ventilação invasiva (com tubo endotraqueal) e não invasiva (com máscaras ou interfaces).",
                "CPAP (Continuous Positive Airway Pressure) é uma modalidade de ventilação não invasiva que mantém pressão positiva contínua nas vias aéreas.",
                "A ventilação não invasiva é indicada para pacientes com insuficiência respiratória aguda, mas com estado de consciência preservado e capacidade de proteger as vias aéreas.",
                "FiO2 é a fração de oxigênio inspirado, representando a concentração de oxigênio no ar que o paciente respira, variando de 21% (ar ambiente) a 100%.",
                "Monitora-se através de parâmetros como saturação de oxigênio, gasometria arterial, pressão arterial, frequência cardíaca e parâmetros do ventilador (pressão, volume, frequência).",
                "PEEP (Positive End-Expiratory Pressure) é a pressão positiva ao final da expiração, que mantém os alvéolos abertos e melhora a oxigenação.",
                "Complicações incluem barotrauma, volutrauma, pneumonia associada à ventilação, lesão por pressão e desconforto do paciente.",
                "O desmame deve ser gradual, avaliando a capacidade do paciente de respirar espontaneamente através de testes de respiração espontânea e redução progressiva do suporte.",
                "A SDRA é uma condição grave caracterizada por inflamação pulmonar difusa, edema não cardiogênico e hipoxemia refratária.",
                
                // NOVAS RESPOSTAS SOBRE NEONATOLOGIA
                "O suporte ventilatório avançado em neonatologia inclui modalidades como High-Frequency Oscillatory Ventilation (HFOV), High-Frequency Jet Ventilation (HFJV), ventilação com oscilação de volume, e suporte com óxido nítrico inalado. Estas técnicas são usadas quando a ventilação convencional não é suficiente para manter a oxigenação adequada em recém-nascidos críticos.",
                "O oxigênio em neonatologia deve ser usado quando a saturação periférica de oxigênio (SpO2) estiver abaixo de 90-92% em recém-nascidos a termo, ou conforme protocolos específicos para prematuros. É crucial monitorar frequentemente para evitar tanto a hipoxemia quanto a hiperoxemia, que pode causar retinopatia da prematuridade e lesão pulmonar.",
                "O suporte ventilatório invasivo em neonatos envolve a intubação endotraqueal e conexão a um ventilador mecânico. É indicado em casos de: apneia grave, insuficiência respiratória refratária a CPAP, necessidade de altas concentrações de oxigênio (FiO2 > 0.6-0.8), acidose respiratória grave (pH < 7.25), ou instabilidade hemodinâmica.",
                "A insuflação em neonatologia (como manobras de recrutamento alveolar) deve ser realizada com extrema cautela. Pressões de insuflação geralmente variam de 20-30 cmH2O por 10-20 segundos, mas devem ser individualizadas. Em prematuros extremos, pressões mais baixas (15-25 cmH2O) são recomendadas para prevenir barotrauma e volutrauma.",
                
                // Respostas Genéricas
                "Aqui está um exemplo de código Python: `print('Hello World')`",
                "Assunto: Reunião. Prezado Senhor, gostaria de agendar uma reunião...",
                "Gerando imagem... [IMAGEM CRIADA]",
                "Resumindo: O texto trata de inteligência artificial e suas aplicações."
            ];
            
            this.shortcutActions = {
                ventilacao: {
                    placeholder: "Modo ventilação mecânica ativado. Faça suas perguntas sobre ventilação.",
                    message: "Modo ventilação mecânica ativado!"
                },
                neonatologia: {
                    placeholder: "Modo neonatologia ativado. Pergunte sobre cuidados neonatais.",
                    message: "Modo neonatologia ativado!"
                },
                cpap: {
                    placeholder: "Pergunte sobre CPAP (Continuous Positive Airway Pressure).",
                    message: "Foco em CPAP ativado!"
                },
                peep: {
                    placeholder: "Pergunte sobre PEEP (Positive End-Expiratory Pressure).",
                    message: "Foco em PEEP ativado!"
                },
                oxigenio: {
                    placeholder: "Pergunte sobre uso de oxigênio em terapia respiratória.",
                    message: "Foco em oxigenoterapia ativado!"
                }
            };
            
            this.init();
        }
        
        init() {
            this.cacheElements();
            this.setupGreeting();
            this.initVoiceRecognition();
            this.initSpeechSynthesis();
            this.setupEventListeners();
            this.setupCarousel();
            this.startTypingEffect();
            this.setupAccessibility();
            this.setupSidebar();
            this.checkScreenSize();
            this.setupFeaturesPanel();
            this.setupVoiceStyles();
        }
        
        initVoiceRecognition() {
            // Verificar se o navegador suporta reconhecimento de voz
            if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                this.state.recognition = new SpeechRecognition();
                
                // Configurações do reconhecimento
                this.state.recognition.continuous = true;
                this.state.recognition.interimResults = false;
                this.state.recognition.lang = 'pt-BR';
                this.state.recognition.maxAlternatives = 1;
                
                // Eventos do reconhecimento
                this.state.recognition.onstart = () => {
                    console.log('Reconhecimento de voz iniciado');
                    this.state.isListening = true;
                    this.updateVoiceButtonState(true);
                };
                
                this.state.recognition.onresult = (event) => {
                    const transcript = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                    console.log('Texto reconhecido:', transcript);
                    
                    this.processVoiceCommand(transcript);
                };
                
                this.state.recognition.onerror = (event) => {
                    console.error('Erro no reconhecimento:', event.error);
                    this.state.isListening = false;
                    this.updateVoiceButtonState(false);
                    
                    // Se for erro de permissão, mostrar notificação
                    if (event.error === 'not-allowed') {
                        this.showNotification(
                            'Microfone bloqueado',
                            'Por favor, permita o acesso ao microfone nas configurações do navegador.',
                            'error',
                            'fa-microphone-slash'
                        );
                    }
                    
                    // Se o modo Hey Reelmi estiver ativo, tentar reiniciar após erro
                    if (this.state.heyReelmiActive) {
                        setTimeout(() => {
                            this.startHeyReelmiListening();
                        }, 2000);
                    }
                };
                
                this.state.recognition.onend = () => {
                    console.log('Reconhecimento de voz encerrado');
                    this.state.isListening = false;
                    this.updateVoiceButtonState(false);
                    
                    // Se o modo Hey Reelmi estiver ativo, reiniciar a escuta
                    if (this.state.heyReelmiActive && !this.state.isWaitingForCommand) {
                        this.startHeyReelmiListening();
                    }
                };
                
            } else {
                console.warn('Reconhecimento de voz não suportado neste navegador');
                this.showNotification(
                    'Funcionalidade não suportada',
                    'Seu navegador não suporta reconhecimento de voz. Tente usar Google Chrome.',
                    'warning',
                    'fa-exclamation-triangle'
                );
            }
        }
        
        initSpeechSynthesis() {
            if (this.state.speechSynthesis) {
                // Carregar vozes disponíveis
                const loadVoices = () => {
                    this.state.availableVoices = this.state.speechSynthesis.getVoices();
                    this.state.voicesLoaded = true;
                    
                    // Selecionar voz em português
                    const portugueseVoices = this.state.availableVoices.filter(voice => 
                        voice.lang.startsWith('pt-') || voice.lang.includes('pt')
                    );
                    
                    if (portugueseVoices.length > 0) {
                        this.state.currentVoice = portugueseVoises[0];
                    } else if (this.state.availableVoices.length > 0) {
                        this.state.currentVoice = this.state.availableVoices[0];
                    }
                };
                
                // Carregar vozes quando estiverem disponíveis
                if (this.state.speechSynthesis.getVoices().length > 0) {
                    loadVoices();
                } else {
                    this.state.speechSynthesis.onvoiceschanged = loadVoices;
                }
            }
        }
        
        setupVoiceStyles() {
            const style = document.createElement('style');
            style.textContent = `
                .voice-listening-indicator {
                    position: fixed;
                    bottom: 20px;
                    right: 20px;
                    background: var(--danger-gradient);
                    color: white;
                    padding: 10px 15px;
                    border-radius: var(--radius-full);
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    z-index: 10000;
                    box-shadow: 0 5px 15px rgba(247, 37, 133, 0.3);
                    animation: pulse 1.5s infinite;
                    font-size: 13px;
                    font-weight: 600;
                }
                
                .voice-listening-indicator i {
                    animation: pulse 0.8s infinite alternate;
                }
            `;
            document.head.appendChild(style);
        }
        
        processVoiceCommand(transcript) {
            console.log('Processando comando de voz:', transcript);
            
            // Verificar se é o comando "Hey Reelmi"
            if (transcript.includes(this.state.heyReelmiCommand) || transcript.includes("ei reelmi")) {
                this.showNotification(
                    'Hey Reelmi!',
                    'Comando reconhecido. Estou ouvindo...',
                    'success',
                    'fa-microphone'
                );
                
                // Responder com voz
                this.speakResponse("Olá! Eu sou a Reelmi. Como posso ajudar você hoje?");
                
                // Aguardar pergunta
                this.state.isWaitingForCommand = true;
                setTimeout(() => {
                    this.showVoiceListeningIndicator();
                }, 500);
                return;
            }
            
            // Se estamos esperando por um comando após "Hey Reelmi"
            if (this.state.isWaitingForCommand || this.state.voiceActive || this.state.fullscreenVoiceActive) {
                this.handleVoiceInput(transcript);
            }
        }
        
        handleVoiceInput(transcript) {
            // Remover o indicador de escuta
            this.removeVoiceListeningIndicator();
            this.state.isWaitingForCommand = false;
            
            // Mostrar notificação com o texto reconhecido
            this.showNotification(
                'Voz reconhecida',
                `"${transcript}"`,
                'info',
                'fa-microphone'
            );
            
            // Processar a entrada
            if (this.elements.chatFullscreen.classList.contains('active')) {
                // Estamos no chat fullscreen
                this.elements.fullscreenChatInput.value = transcript;
                this.speakResponse("Processando sua pergunta...");
                
                // Enviar mensagem após um breve delay
                setTimeout(() => {
                    this.sendFullscreenMessage();
                }, 1000);
            } else {
                // Estamos no dashboard
                this.elements.chatInput.value = transcript;
                this.speakResponse("Processando sua pergunta...");
                
                // Abrir chat fullscreen e enviar mensagem
                setTimeout(() => {
                    this.sendMessage();
                }, 1000);
            }
        }
        
        speakResponse(text) {
            if (!this.state.speechSynthesis || !this.state.speechActive) return;
            
            // Cancelar qualquer fala em andamento
            this.state.speechSynthesis.cancel();
            
            // Criar utterance
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'pt-BR';
            utterance.rate = 1.0;
            utterance.pitch = 1.0;
            utterance.volume = 1.0;
            
            // Usar voz selecionada
            if (this.state.currentVoice) {
                utterance.voice = this.state.currentVoice;
            }
            
            // Eventos
            utterance.onstart = () => {
                console.log('Síntese de fala iniciada');
            };
            
            utterance.onend = () => {
                console.log('Síntese de fala concluída');
                // Se o modo Hey Reelmi estiver ativo, voltar a escutar
                if (this.state.heyReelmiActive && this.state.isListening) {
                    setTimeout(() => {
                        this.startHeyReelmiListening();
                    }, 1000);
                }
            };
            
            utterance.onerror = (event) => {
                console.error('Erro na síntese de fala:', event);
            };
            
            // Falar
            this.state.speechSynthesis.speak(utterance);
        }
        
        startHeyReelmiListening() {
            if (this.state.recognition && this.state.heyReelmiActive && !this.state.isListening) {
                try {
                    this.state.recognition.start();
                    this.showNotification(
                        'Hey Reelmi ativo',
                        'Diga "Hey Reelmi" seguido da sua pergunta.',
                        'info',
                        'fa-microphone'
                    );
                } catch (error) {
                    console.error('Erro ao iniciar reconhecimento:', error);
                    // Tentar novamente após 2 segundos
                    setTimeout(() => {
                        this.startHeyReelmiListening();
                    }, 2000);
                }
            }
        }
        
        stopHeyReelmiListening() {
            if (this.state.recognition && this.state.isListening) {
                this.state.recognition.stop();
                this.state.isListening = false;
                this.state.isWaitingForCommand = false;
                this.updateVoiceButtonState(false);
                this.removeVoiceListeningIndicator();
            }
        }
        
        showVoiceListeningIndicator() {
            this.removeVoiceListeningIndicator();
            
            const indicator = document.createElement('div');
            indicator.className = 'voice-listening-indicator';
            indicator.id = 'voiceListeningIndicator';
            indicator.innerHTML = `
                <i class="fas fa-microphone"></i>
                <span>Ouvindo...</span>
            `;
            
            document.body.appendChild(indicator);
        }
        
        removeVoiceListeningIndicator() {
            const indicator = document.getElementById('voiceListeningIndicator');
            if (indicator) {
                indicator.remove();
            }
        }
        
        updateVoiceButtonState(isListening) {
            // Atualizar botões de voz
            if (isListening) {
                if (this.elements.voiceBtn) {
                    this.elements.voiceBtn.classList.add('listening');
                    this.elements.voiceBtn.innerHTML = '<i class="fas fa-microphone"></i>';
                    this.elements.voiceBtn.querySelector('.btn-tooltip').textContent = 'Parar escuta';
                }
                if (this.elements.fullscreenVoiceBtn) {
                    this.elements.fullscreenVoiceBtn.classList.add('listening');
                    this.elements.fullscreenVoiceBtn.innerHTML = '<i class="fas fa-microphone"></i>';
                    this.elements.fullscreenVoiceBtn.querySelector('.btn-tooltip').textContent = 'Parar escuta';
                }
            } else {
                if (this.elements.voiceBtn) {
                    this.elements.voiceBtn.classList.remove('listening');
                    this.elements.voiceBtn.innerHTML = '<i class="fas fa-headphones"></i>';
                    this.elements.voiceBtn.querySelector('.btn-tooltip').textContent = 'Ativar Voz';
                }
                if (this.elements.fullscreenVoiceBtn) {
                    this.elements.fullscreenVoiceBtn.classList.remove('listening');
                    this.elements.fullscreenVoiceBtn.innerHTML = '<i class="fas fa-headphones"></i>';
                    this.elements.fullscreenVoiceBtn.querySelector('.btn-tooltip').textContent = 'Ativar Voz';
                }
            }
        }
        
        cacheElements() {
            this.elements = {
                // Sidebar
                sidebar: document.getElementById('sidebar'),
                sidebarToggle: document.getElementById('sidebarToggle'),
                sidebarOverlay: document.getElementById('sidebarOverlay'),
                mainContent: document.getElementById('mainContent'),
                mainContainer: document.getElementById('mainContainer'),
                
                // NOVO: Botão de fechar sidebar
                sidebarCloseBtn: document.getElementById('sidebarCloseBtn'),
                
                // Menu Sidebar
                sidebarMenuItems: document.querySelectorAll('.sidebar-menu-item'),
                chatInteligenteBtn: document.getElementById('chatInteligenteBtn'),
                newChatBtn: document.getElementById('newChatBtn'),
                
                // Dashboard
                greeting: document.getElementById('greeting'),
                headerIcon: document.getElementById('headerIcon'),
                headerDescription: document.getElementById('headerDescription'),
                chatInput: document.getElementById('chatInput'),
                inputSection: document.getElementById('inputSection'),
                writeBtn: document.getElementById('writeBtn'),
                searchBtn: document.getElementById('searchBtn'),
                fileBtn: document.getElementById('fileBtn'),
                voiceBtn: document.getElementById('voiceBtn'),
                // NOVO: Botão de enviar
                sendBtn: document.getElementById('sendBtn'),
                openAllPlatforms: document.getElementById('openAllPlatforms'),
                shortcuts: document.querySelectorAll('.shortcut'),
                platformsCarousel: document.getElementById('platformsCarousel'),
                carouselPrev: document.querySelector('.carousel-nav.prev'),
                carouselNext: document.querySelector('.carousel-nav.next'),
                carouselIndicators: document.querySelectorAll('.carousel-indicator'),
                
                // Botão de tema
                themeBtn: document.getElementById('themeBtn'),
                
                // Botão de funcionalidades
                featuresBtn: document.getElementById('featuresBtn'),
                featuresPanel: document.getElementById('featuresPanel'),
                
                // Controles de fonte
                fontDecreaseBtn: document.getElementById('fontDecreaseBtn'),
                fontResetBtn: document.getElementById('fontResetBtn'),
                fontIncreaseBtn: document.getElementById('fontIncreaseBtn'),
                
                // Itens do painel
                heyReelmiToggle: document.getElementById('heyReelmiToggle'),
                sendImageBtn: document.getElementById('sendImageBtn'),
                securityAlertsBtn: document.getElementById('securityAlertsBtn'),
                recommendationsBtn: document.getElementById('recommendationsBtn'),
                clearChatBtn: document.getElementById('clearChatBtn'),
                darkModeToggle: document.getElementById('darkModeToggle'),
                voiceSettingsBtn: document.getElementById('voiceSettingsBtn'),
                aboutBtn: document.getElementById('aboutBtn'),
                
                // Modal
                confirmationModal: document.getElementById('confirmationModal'),
                modalClose: document.getElementById('modalClose'),
                modalCancel: document.getElementById('modalCancel'),
                modalConfirm: document.getElementById('modalConfirm'),
                
                // Chat Fullscreen
                chatFullscreen: document.getElementById('chatFullscreen'),
                chatFullscreenTitle: document.getElementById('chatFullscreenTitle'),
                chatMessagesArea: document.getElementById('chatMessagesArea'),
                welcomeMessage: document.getElementById('welcomeMessage'),
                typingIndicator: document.getElementById('typingIndicator'),
                fullscreenChatInput: document.getElementById('fullscreenChatInput'),
                fullscreenInputSection: document.getElementById('fullscreenInputSection'),
                fullscreenWriteBtn: document.getElementById('fullscreenWriteBtn'),
                fullscreenSearchBtn: document.getElementById('fullscreenSearchBtn'),
                fullscreenFileBtn: document.getElementById('fullscreenFileBtn'),
                fullscreenVoiceBtn: document.getElementById('fullscreenVoiceBtn'),
                // NOVO: Botão de enviar no fullscreen
                fullscreenSendBtn: document.getElementById('fullscreenSendBtn'),
                clearFullscreenChat: document.getElementById('clearFullscreenChat'),
                closeFullscreenChat: document.getElementById('closeFullscreenChat')
            };
        }
        
        setupGreeting() {
            const hour = new Date().getHours();
            let greetingText, iconClass, iconGradient, description;
            
            if (hour < 12) {
                greetingText = "Bom dia, como posso ajudar?";
                iconGradient = "linear-gradient(135deg, #ff9a00 0%, #ff6a00 100%)";
                description = "Especialista em ventilação mecânica e neonatologia. O que vamos aprender hoje?";
            } else if (hour < 18) {
                greetingText = "Boa tarde, como posso ajudar?";
                iconGradient = "linear-gradient(135deg, #00dbde 0%, #fc00ff 100%)";
                description = "Explore conhecimentos sobre ventilação mecânica, CPAP, PEEP e cuidados neonatais";
            } else {
                greetingText = "Boa noite, como posso ajudar?";
                iconClass = "fas fa-moon";
                iconGradient = "linear-gradient(135deg, #667eea 0%, #764ba2 100%)";
                description = "Especialista em ventilação mecânica e neonatologia. Em que posso ser útil?";
            }
            
            this.elements.greeting.textContent = greetingText;
            if (iconClass) this.elements.headerIcon.className = iconClass;
            this.elements.headerIcon.style.background = iconGradient;
            this.elements.headerIcon.style.webkitBackgroundClip = "text";
            this.elements.headerIcon.style.webkitTextFillColor = "transparent";
            this.elements.headerDescription.textContent = description;
            
            this.elements.chatFullscreenTitle.textContent = `Reelmi AI Chat - ${greetingText}`;
        }
        
        setupFeaturesPanel() {
            document.addEventListener('click', (e) => {
                if (!this.elements.featuresPanel.contains(e.target) && 
                    !this.elements.featuresBtn.contains(e.target) && 
                    this.state.featuresPanelOpen) {
                    this.toggleFeaturesPanel(false);
                }
            });
            
            this.elements.heyReelmiToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                this.toggleHeyReelmi();
                this.animateButton(this.elements.heyReelmiToggle);
            });
            
            this.elements.sendImageBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleSendImage();
                this.animateButton(this.elements.sendImageBtn);
            });
            
            this.elements.securityAlertsBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleSecurityAlerts();
                this.animateButton(this.elements.securityAlertsBtn);
            });
            
            this.elements.recommendationsBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleRecommendations();
                this.animateButton(this.elements.recommendationsBtn);
            });
            
            this.elements.clearChatBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleClearChat();
                this.animateButton(this.elements.clearChatBtn);
            });
            
            this.elements.darkModeToggle.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleDarkMode();
                this.animateButton(this.elements.darkModeToggle);
            });
            
            this.elements.voiceSettingsBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleVoiceSettings();
                this.animateButton(this.elements.voiceSettingsBtn);
            });
            
            this.elements.aboutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleAbout();
                this.animateButton(this.elements.aboutBtn);
            });
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.state.featuresPanelOpen) {
                    this.toggleFeaturesPanel(false);
                }
            });
        }
        
        toggleHeyReelmi() {
            this.state.heyReelmiActive = !this.state.heyReelmiActive;
            this.state.speechActive = this.state.heyReelmiActive; // Ativar síntese de voz também
            const toggleSwitch = this.elements.heyReelmiToggle.querySelector('.toggle-switch');
            
            if (this.state.heyReelmiActive) {
                toggleSwitch.classList.add('active');
                this.showNotification(
                    'Hey Reelmi ativado', 
                    'Agora você pode dizer "Hey Reelmi" para ativar a assistente por voz.',
                    'success',
                    'fa-microphone'
                );
                
                // Solicitar permissão de microfone
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ audio: true })
                        .then(() => {
                            // Permissão concedida, iniciar escuta
                            this.startHeyReelmiListening();
                        })
                        .catch((error) => {
                            console.error('Erro ao acessar microfone:', error);
                            this.showNotification(
                                'Permissão necessária',
                                'Por favor, permita o acesso ao microfone para usar o Hey Reelmi.',
                                'error',
                                'fa-microphone-slash'
                            );
                        });
                }
                
            } else {
                toggleSwitch.classList.remove('active');
                this.stopHeyReelmiListening();
                this.showNotification(
                    'Hey Reelmi desativado', 
                    'Comando de voz por ativação desativado.',
                    'info',
                    'fa-microphone-slash'
                );
            }
        }
        
        toggleVoice() {
            this.state.voiceActive = !this.state.voiceActive;
            this.state.speechActive = this.state.voiceActive; // Ativar síntese de voz também
            
            if (this.state.voiceActive) {
                // Solicitar permissão de microfone
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ audio: true })
                        .then(() => {
                            // Permissão concedida
                            this.elements.voiceBtn.classList.add('active');
                            this.elements.voiceBtn.querySelector('.btn-tooltip').textContent = 'Desativar Voz';
                            this.showNotification(
                                'Voz ativada', 
                                'Diga "Hey Reelmi" seguido da sua pergunta sobre ventilação mecânica ou neonatologia.',
                                'info', 
                                'fa-microphone'
                            );
                            
                            // Iniciar reconhecimento de voz
                            if (this.state.recognition && !this.state.isListening) {
                                this.state.recognition.start();
                            }
                        })
                        .catch((error) => {
                            console.error('Erro ao acessar microfone:', error);
                            this.state.voiceActive = false;
                            this.showNotification(
                                'Permissão necessária',
                                'Por favor, permita o acesso ao microfone para usar o reconhecimento de voz.',
                                'error',
                                'fa-microphone-slash'
                            );
                        });
                }
            } else {
                this.elements.voiceBtn.classList.remove('active');
                this.elements.voiceBtn.querySelector('.btn-tooltip').textContent = 'Ativar Voz';
                this.showNotification(
                    'Voz desativada', 
                    'Reconhecimento de voz desativado.',
                    'info', 
                    'fa-microphone-slash'
                );
                
                // Parar reconhecimento de voz se não estiver no modo Hey Reelmi
                if (!this.state.heyReelmiActive && this.state.recognition && this.state.isListening) {
                    this.state.recognition.stop();
                }
            }
            
            this.animateButton(this.elements.voiceBtn);
        }
        
        toggleFullscreenVoice() {
            this.state.fullscreenVoiceActive = !this.state.fullscreenVoiceActive;
            this.state.speechActive = this.state.fullscreenVoiceActive; // Ativar síntese de voz também
            
            if (this.state.fullscreenVoiceActive) {
                // Solicitar permissão de microfone
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ audio: true })
                        .then(() => {
                            // Permissão concedida
                            this.elements.fullscreenVoiceBtn.classList.add('active');
                            this.elements.fullscreenVoiceBtn.querySelector('.btn-tooltip').textContent = 'Desativar Voz';
                            this.showNotification(
                                'Voz ativada', 
                                'Diga "Hey Reelmi" seguido da sua pergunta sobre ventilação mecânica ou neonatologia.',
                                'info', 
                                'fa-microphone'
                            );
                            
                            // Iniciar reconhecimento de voz
                            if (this.state.recognition && !this.state.isListening) {
                                this.state.recognition.start();
                            }
                        })
                        .catch((error) => {
                            console.error('Erro ao acessar microfone:', error);
                            this.state.fullscreenVoiceActive = false;
                            this.showNotification(
                                'Permissão necessária',
                                'Por favor, permita o acesso ao microfone para usar o reconhecimento de voz.',
                                'error',
                                'fa-microphone-slash'
                            );
                        });
                }
            } else {
                this.elements.fullscreenVoiceBtn.classList.remove('active');
                this.elements.fullscreenVoiceBtn.querySelector('.btn-tooltip').textContent = 'Ativar Voz';
                this.showNotification(
                    'Voz desativada', 
                    'Reconhecimento de voz desativado.',
                    'info', 
                    'fa-microphone-slash'
                );
                
                // Parar reconhecimento de voz se não estiver no modo Hey Reelmi
                if (!this.state.heyReelmiActive && this.state.recognition && this.state.isListening) {
                    this.state.recognition.stop();
                }
            }
            
            this.animateButton(this.elements.fullscreenVoiceBtn);
        }
        
        handleSendImage() {
            this.toggleFeaturesPanel(false);
            this.showNotification(
                'Enviar Imagem', 
                'Abrindo seletor de imagens... Selecione uma imagem para análise.',
                'info',
                'fa-image'
            );
            
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.style.display = 'none';
            
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    this.showNotification(
                        'Imagem selecionada', 
                        `${file.name} (${(file.size / 1024).toFixed(0)} KB) selecionada para análise.`,
                        'success',
                        'fa-check-circle'
                    );
                }
            });
            
            document.body.appendChild(fileInput);
            fileInput.click();
            setTimeout(() => {
                document.body.removeChild(fileInput);
            }, 100);
        }
        
        handleSecurityAlerts() {
            this.toggleFeaturesPanel(false);
            this.showNotification(
                'Avisos de Segurança', 
                'Configurações de segurança atualizadas. Todos os avisos estão ativos.',
                'warning',
                'fa-shield-alt'
            );
            
            const badge = this.elements.securityAlertsBtn.querySelector('.feature-badge');
            if (badge.textContent === 'ON') {
                badge.textContent = 'OFF';
                badge.style.background = 'rgba(247, 37, 133, 0.15)';
                badge.style.color = '#f72585';
            } else {
                badge.textContent = 'ON';
                badge.style.background = 'rgba(0, 219, 222, 0.15)';
                badge.style.color = '#00dbde';
            }
        }
        
        handleRecommendations() {
            this.toggleFeaturesPanel(false);
            this.showNotification(
                'Recomendações', 
                'Baseado no seu uso, recomendamos explorar as ferramentas de análise de dados e criação de imagens.',
                'info',
                'fa-star'
            );
        }
        
        handleClearChat() {
            this.toggleFeaturesPanel(false);
            if (confirm('Tem certeza que deseja limpar todo o histórico de chat?')) {
                this.state.chatMessages = [];
                this.state.fullscreenChatMessages = [];
                this.showNotification(
                    'Chat limpo', 
                    'Todo o histórico de conversas foi removido.',
                    'success',
                    'fa-trash-alt'
                );
            }
        }
        
        toggleDarkMode() {
            this.toggleTheme();
            this.animateButton(this.elements.darkModeToggle);
        }
        
        handleVoiceSettings() {
            this.toggleFeaturesPanel(false);
            this.showNotification(
                'Configurações de Voz', 
                'Abrindo configurações de voz. Você pode ajustar velocidade, tom e idioma.',
                'info',
                'fa-volume-up'
            );
        }
        
        handleAbout() {
            this.toggleFeaturesPanel(false);
            this.showNotification(
                'Sobre Reelmi AI', 
                'Versão 2.0.1 • Interface Universal de IA • Desenvolvido com ❤️ para facilitar o acesso a múltiplas plataformas de IA.',
                'info',
                'fa-info-circle'
            );
        }
        
        toggleTheme() {
            this.state.currentTheme = this.state.currentTheme === 'dark' ? 'light' : 'dark';
            
            if (this.state.currentTheme === 'light') {
                document.body.classList.add('light-theme');
                this.elements.themeBtn.innerHTML = '<i class="fas fa-sun"></i>';
                this.elements.themeBtn.querySelector('.btn-tooltip').textContent = 'Tema Claro';
                
                const darkModeToggle = this.elements.darkModeToggle.querySelector('.toggle-switch');
                darkModeToggle.classList.remove('active');
                
                this.showNotification(
                    'Tema claro ativado',
                    'Interface alterada para tema claro. Melhor para ambientes claros.',
                    'info',
                    'fa-sun'
                );
            } else {
                document.body.classList.remove('light-theme');
                this.elements.themeBtn.innerHTML = '<i class="fas fa-moon"></i>';
                this.elements.themeBtn.querySelector('.btn-tooltip').textContent = 'Tema Escuro';
                
                const darkModeToggle = this.elements.darkModeToggle.querySelector('.toggle-switch');
                darkModeToggle.classList.add('active');
                
                this.showNotification(
                    'Tema escuro ativado',
                    'Interface alterada para tema escuro. Melhor para uso noturno.',
                    'info',
                    'fa-moon'
                );
            }
            
            this.animateButton(this.elements.themeBtn);
        }
        
        adjustFontSize(change) {
            this.state.fontSize += change;
            
            if (this.state.fontSize < this.state.minFontSize) {
                this.state.fontSize = this.state.minFontSize;
            }
            if (this.state.fontSize > this.state.maxFontSize) {
                this.state.fontSize = this.state.maxFontSize;
            }
            
            document.body.style.fontSize = `${this.state.fontSize}%`;
            
            const action = change > 0 ? 'aumentada' : 'diminuída';
            this.showNotification(
                `Fonte ${action}`,
                `Tamanho da fonte ajustado para ${this.state.fontSize}%`,
                'info',
                change > 0 ? 'fa-search-plus' : 'fa-search-minus'
            );
            
            const button = change > 0 ? this.elements.fontIncreaseBtn : this.elements.fontDecreaseBtn;
            this.animateButton(button);
        }
        
        resetFontSize() {
            this.state.fontSize = 100;
            document.body.style.fontSize = '100%';
            
            this.showNotification(
                'Fonte resetada',
                'Tamanho da fonte restaurado para o padrão',
                'success',
                'fa-undo'
            );
            
            this.animateButton(this.elements.fontResetBtn);
        }
        
        setupEventListeners() {
            // Botão de tema
            this.elements.themeBtn.addEventListener('click', () => {
                this.toggleTheme();
                this.animateButton(this.elements.themeBtn);
            });
            
            // Botão de funcionalidades
            this.elements.featuresBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.toggleFeaturesPanel();
                this.animateButton(this.elements.featuresBtn);
            });
            
            // Controles de fonte
            this.elements.fontDecreaseBtn.addEventListener('click', () => this.adjustFontSize(-10));
            this.elements.fontResetBtn.addEventListener('click', () => this.resetFontSize());
            this.elements.fontIncreaseBtn.addEventListener('click', () => this.adjustFontSize(10));
            
            // Botões redondos do dashboard
            this.elements.writeBtn.addEventListener('click', () => this.handleWrite());
            this.elements.searchBtn.addEventListener('click', () => this.handleSearch());
            this.elements.fileBtn.addEventListener('click', () => this.handleFileUpload());
            this.elements.voiceBtn.addEventListener('click', () => this.toggleVoice());
            // NOVO: Botão de enviar
            this.elements.sendBtn.addEventListener('click', () => this.sendMessage());
            this.elements.openAllPlatforms.addEventListener('click', () => this.showConfirmationModal());
            
            // Botões redondos do chat fullscreen
            this.elements.fullscreenWriteBtn.addEventListener('click', () => this.handleFullscreenWrite());
            this.elements.fullscreenSearchBtn.addEventListener('click', () => this.handleFullscreenSearch());
            this.elements.fullscreenFileBtn.addEventListener('click', () => this.handleFullscreenFileUpload());
            this.elements.fullscreenVoiceBtn.addEventListener('click', () => this.toggleFullscreenVoice());
            // NOVO: Botão de enviar no fullscreen
            this.elements.fullscreenSendBtn.addEventListener('click', () => this.sendFullscreenMessage());
            this.elements.clearFullscreenChat.addEventListener('click', () => this.clearFullscreenChat());
            this.elements.closeFullscreenChat.addEventListener('click', () => this.closeFullscreenChat());
            
            // Botões da sidebar
            this.elements.chatInteligenteBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.openFullscreenChat();
                this.animateButton(this.elements.chatInteligenteBtn);
            });
            
            this.elements.newChatBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.openFullscreenChat();
                this.clearFullscreenChat();
                this.showNotification('Novo Chat', 'Novo chat iniciado com sucesso!', 'success', 'fa-plus-circle');
                this.animateButton(this.elements.newChatBtn);
            });
            
            // Atalhos do dashboard
            this.elements.shortcuts.forEach(shortcut => {
                shortcut.addEventListener('click', (e) => {
                    const action = e.currentTarget.dataset.action;
                    this.handleShortcut(action);
                    this.animateButton(e.currentTarget);
                });
            });
            
            // Inputs
            this.elements.chatInput.addEventListener('focus', () => {
                this.elements.inputSection.classList.add('focused');
            });
            
            this.elements.chatInput.addEventListener('blur', () => {
                this.elements.inputSection.classList.remove('focused');
            });
            
            this.elements.chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.sendMessage();
                }
            });
            
            this.elements.fullscreenChatInput.addEventListener('focus', () => {
                this.elements.fullscreenInputSection.classList.add('focused');
            });
            
            this.elements.fullscreenChatInput.addEventListener('blur', () => {
                this.elements.fullscreenInputSection.classList.remove('focused');
            });
            
            this.elements.fullscreenChatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.sendFullscreenMessage();
                }
            });
            
            // Modal
            this.elements.modalClose.addEventListener('click', () => this.hideConfirmationModal());
            this.elements.modalCancel.addEventListener('click', () => this.hideConfirmationModal());
            this.elements.modalConfirm.addEventListener('click', () => this.openAllPlatforms());
            
            this.elements.confirmationModal.addEventListener('click', (e) => {
                if (e.target === this.elements.confirmationModal) {
                    this.hideConfirmationModal();
                }
            });
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.elements.confirmationModal.classList.contains('active')) {
                    this.hideConfirmationModal();
                }
                if (e.key === 'Escape' && this.elements.chatFullscreen.classList.contains('active')) {
                    this.closeFullscreenChat();
                }
                if (e.key === 'Escape' && this.state.featuresPanelOpen) {
                    this.toggleFeaturesPanel(false);
                }
                if (e.key === 'Escape' && this.state.isListening) {
                    this.stopHeyReelmiListening();
                }
            });
            
            // Menu items da sidebar
            this.elements.sidebarMenuItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    this.elements.sidebarMenuItems.forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                    
                    const itemText = item.querySelector('span').textContent;
                    this.showNotification(`Navegação`, `Abrindo: ${itemText}`, 'info', item.querySelector('i').className);
                    
                    if (window.innerWidth <= 768) {
                        this.toggleSidebar(false);
                    }
                });
            });
        }
        
        setupSidebar() {
            // Botão de toggle (externo)
            this.elements.sidebarToggle.addEventListener('click', () => {
                this.toggleSidebar();
            });
            
            // NOVO: Botão de fechar (dentro da sidebar)
            this.elements.sidebarCloseBtn.addEventListener('click', () => {
                this.toggleSidebar(false);
            });
            
            this.elements.sidebarOverlay.addEventListener('click', () => {
                this.toggleSidebar(false);
            });
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && window.innerWidth <= 768 && this.state.sidebarOpen) {
                    this.toggleSidebar(false);
                }
            });
            
            window.addEventListener('resize', () => {
                this.checkScreenSize();
            });
        }
        
        toggleSidebar(forceState) {
            const isMobile = window.innerWidth <= 768;
            
            if (forceState !== undefined) {
                this.state.sidebarOpen = forceState;
            } else {
                this.state.sidebarOpen = !this.state.sidebarOpen;
            }
            
            if (isMobile) {
                if (this.state.sidebarOpen) {
                    this.elements.sidebar.classList.add('open');
                    this.elements.sidebarOverlay.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                } else {
                    this.elements.sidebar.classList.remove('open');
                    this.elements.sidebarOverlay.style.display = 'none';
                    document.body.style.overflow = '';
                }
            } else {
                this.state.sidebarOpen = true;
                this.elements.sidebar.classList.remove('open');
                this.elements.sidebarOverlay.style.display = 'none';
                document.body.style.overflow = '';
            }
            
            const icon = this.elements.sidebarToggle.querySelector('i');
            if (this.state.sidebarOpen && isMobile) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        }
        
        checkScreenSize() {
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile) {
                if (!this.state.sidebarOpen) {
                    this.elements.sidebar.classList.remove('open');
                    this.elements.sidebarOverlay.style.display = 'none';
                    this.elements.sidebarToggle.querySelector('i').className = 'fas fa-bars';
                }
            } else {
                this.state.sidebarOpen = true;
                this.elements.sidebar.classList.remove('open');
                this.elements.sidebarOverlay.style.display = 'none';
                this.elements.sidebarToggle.querySelector('i').className = 'fas fa-bars';
                document.body.style.overflow = '';
            }
        }
        
        setupCarousel() {
            if (!this.elements.platformsCarousel) return;
            
            const cardWidth = 196;
            const cardsPerView = Math.floor(this.elements.platformsCarousel.offsetWidth / cardWidth);
            const totalCards = document.querySelectorAll('.platform-card').length;
            const maxScroll = Math.max(0, (totalCards - cardsPerView) * cardWidth);
            
            this.elements.carouselPrev.addEventListener('click', () => {
                this.scrollCarousel(-cardWidth * cardsPerView, maxScroll);
            });
            
            this.elements.carouselNext.addEventListener('click', () => {
                this.scrollCarousel(cardWidth * cardsPerView, maxScroll);
            });
            
            this.elements.carouselIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    const scrollToPosition = (maxScroll / (this.elements.carouselIndicators.length - 1)) * index;
                    this.elements.platformsCarousel.scrollTo({
                        left: scrollToPosition,
                        behavior: 'smooth'
                    });
                    this.updateCarouselIndicators(scrollToPosition, maxScroll);
                });
            });
            
            this.elements.platformsCarousel.addEventListener('scroll', () => {
                this.updateCarouselIndicators(this.elements.platformsCarousel.scrollLeft, maxScroll);
            });
            
            this.setupDragToScroll(this.elements.platformsCarousel);
        }
        
        scrollCarousel(amount, maxScroll) {
            const currentScroll = this.elements.platformsCarousel.scrollLeft;
            const newScroll = Math.max(0, Math.min(currentScroll + amount, maxScroll));
            
            this.elements.platformsCarousel.scrollTo({
                left: newScroll,
                behavior: 'smooth'
            });
            
            this.updateCarouselIndicators(newScroll, maxScroll);
        }
        
        updateCarouselIndicators(scrollPosition, maxScroll) {
            const indicatorCount = this.elements.carouselIndicators.length;
            const currentIndicator = maxScroll > 0 
                ? Math.round(scrollPosition / (maxScroll / (indicatorCount - 1)))
                : 0;
            
            this.elements.carouselIndicators.forEach((indicator, index) => {
                const isActive = index === currentIndicator;
                indicator.classList.toggle('active', isActive);
                indicator.setAttribute('aria-selected', isActive);
            });
        }
        
        setupDragToScroll(element) {
            let isDragging = false;
            let startX, scrollLeft;
            
            element.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.pageX - element.offsetLeft;
                scrollLeft = element.scrollLeft;
                element.style.cursor = 'grabbing';
            });
            
            element.addEventListener('mouseleave', () => {
                isDragging = false;
                element.style.cursor = 'grab';
            });
            
            element.addEventListener('mouseup', () => {
                isDragging = false;
                element.style.cursor = 'grab';
            });
            
            element.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - element.offsetLeft;
                const walk = (x - startX) * 2;
                element.scrollLeft = scrollLeft - walk;
            });
            
            element.addEventListener('touchstart', (e) => {
                isDragging = true;
                startX = e.touches[0].pageX - element.offsetLeft;
                scrollLeft = element.scrollLeft;
            });
            
            element.addEventListener('touchend', () => {
                isDragging = false;
            });
            
            element.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                const x = e.touches[0].pageX - element.offsetLeft;
                const walk = (x - startX) * 2;
                element.scrollLeft = scrollLeft - walk;
            });
        }
        
        startTypingEffect() {
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            
            const type = () => {
                const currentPhrase = this.placeholderPhrases[phraseIndex];
                
                if (isDeleting) {
                    this.elements.chatInput.placeholder = currentPhrase.substring(0, charIndex - 1);
                    this.elements.fullscreenChatInput.placeholder = currentPhrase.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    this.elements.chatInput.placeholder = currentPhrase.substring(0, charIndex + 1);
                    this.elements.fullscreenChatInput.placeholder = currentPhrase.substring(0, charIndex + 1);
                    charIndex++;
                }
                
                if (!isDeleting && charIndex === currentPhrase.length) {
                    isDeleting = true;
                    setTimeout(type, 1500);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % this.placeholderPhrases.length;
                    setTimeout(type, 300);
                } else {
                    setTimeout(type, isDeleting ? 50 : 100);
                }
            };
            
            setTimeout(type, 1000);
        }
        
        setupAccessibility() {
            document.querySelectorAll('.platform-card').forEach((card, index) => {
                const title = card.querySelector('h3').textContent;
                const description = card.querySelector('p').textContent;
                card.setAttribute('aria-label', `${title} - ${description}`);
            });
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    const focusedElement = document.activeElement;
                    if (focusedElement.classList.contains('btn') || 
                        focusedElement.classList.contains('shortcut') ||
                        focusedElement.classList.contains('platform-card') ||
                        focusedElement.classList.contains('sidebar-menu-item')) {
                        focusedElement.classList.add('keyboard-focus');
                    }
                }
            });
            
            document.addEventListener('click', (e) => {
                document.querySelectorAll('.keyboard-focus').forEach(el => {
                    el.classList.remove('keyboard-focus');
                });
            });
        }
        
        openFullscreenChat() {
            if (window.innerWidth <= 768) {
                this.toggleSidebar(false);
            }
            
            this.elements.mainContainer.style.display = 'none';
            this.elements.chatFullscreen.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            setTimeout(() => {
                this.elements.fullscreenChatInput.focus();
            }, 100);
            
            this.showNotification('Chat Inteligente', 'Bem-vindo ao chat da Reelmi AI! Especialista em ventilação mecânica e neonatologia.', 'success', 'fa-comment-dots');
        }
        
        closeFullscreenChat() {
            this.elements.chatFullscreen.classList.remove('active');
            
            setTimeout(() => {
                this.elements.mainContainer.style.display = 'block';
                document.body.style.overflow = '';
            }, 300);
        }
        
        clearFullscreenChat() {
            if (confirm('Tem certeza que deseja limpar toda a conversa?')) {
                this.elements.chatMessagesArea.innerHTML = `
                    <div class="chat-message ai-message">
                        <div class="chat-avatar">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="chat-content">
                            <div class="chat-sender">
                                Reelmi AI
                                <div class="typing-indicator" id="typingIndicator" style="display: none;">
                                    <div class="typing-dot"></div>
                                    <div class="typing-dot"></div>
                                    <div class="typing-dot"></div>
                            </div>
                            <div class="chat-text" id="welcomeMessage">
                                Olá! Eu sou o Reelmi AI, especialista em ventilação mecânica e neonatologia. Como posso ajudar você hoje? Pode me fazer perguntas sobre ventilação mecânica, CPAP, PEEP, cuidados neonatais e muito mais!
                            </div>
                            <div class="chat-time">Agora</div>
                        </div>
                    </div>
                `;
                
                this.state.fullscreenChatMessages = [];
                this.showNotification('Chat limpo', 'Todas as mensagens foram removidas.', 'info', 'fa-trash');
            }
        }
        
        // FUNÇÕES DO DASHBOARD
        handleWrite() {
            this.showNotification('Modo escrita', 'Modo escrita ativado. Digite sua mensagem e pressione Enter para enviar.', 'info');
            this.elements.chatInput.focus();
            this.animateButton(this.elements.writeBtn);
        }
        
        handleSearch() {
            const query = this.elements.chatInput.value.trim();
            if (query) {
                this.showNotification('Pesquisando', `Pesquisando por: "${query}"`, 'info');
                setTimeout(() => {
                    this.showNotification('Resultados', `Encontrados 5 resultados para "${query}"`, 'success');
                }, 1000);
                this.elements.chatInput.value = '';
            } else {
                this.showNotification('Atenção', 'Digite algo para pesquisar!', 'warning');
                this.elements.chatInput.focus();
            }
            this.animateButton(this.elements.searchBtn);
        }
        
        handleFileUpload() {
            this.handleFileUploadHelper(this.elements.chatInput);
            this.animateButton(this.elements.fileBtn);
        }
        
        handleFileUploadHelper(inputElement) {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.style.display = 'none';
            fileInput.accept = '.txt,.pdf,.doc,.docx,.jpg,.png,.mp3,.mp4';
            
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    this.showFileNotification(file);
                    inputElement.placeholder = `Pergunte sobre: ${file.name.substring(0, 20)}${file.name.length > 20 ? '...' : ''}`;
                    inputElement.focus();
                }
            });
            
            document.body.appendChild(fileInput);
            fileInput.click();
            document.body.removeChild(fileInput);
        }
        
        // NOVA FUNÇÃO: Enviar mensagem do dashboard
        sendMessage() {
            const message = this.elements.chatInput.value.trim();
            if (message) {
                // Abre o chat fullscreen
                this.openFullscreenChat();
                
                // Adiciona a mensagem do usuário
                this.addFullscreenMessage('user', message);
                
                // Limpa o input do dashboard
                this.elements.chatInput.value = '';
                
                // Mostra indicador de digitação
                this.showFullscreenTypingIndicator();
                
                // Gera resposta após delay
                setTimeout(() => {
                    this.hideFullscreenTypingIndicator();
                    const resposta = this.gerarRespostaEspecializada(message);
                    this.addFullscreenMessage('ai', resposta);
                    this.scrollFullscreenToBottom();
                    
                    // Responder com voz se a síntese de voz estiver ativa
                    if (this.state.speechActive) {
                        this.speakResponse(resposta);
                    }
                }, 1500);
                
                this.animateButton(this.elements.sendBtn);
            } else {
                this.showNotification('Campo vazio', 'Por favor, digite uma mensagem antes de enviar.', 'warning', 'fa-exclamation-triangle');
            }
        }
        
        // FUNÇÕES DO CHAT FULLSCREEN
        handleFullscreenWrite() {
            this.showNotification('Modo escrita', 'Modo escrita ativado. Digite sua mensagem e pressione Enter para enviar.', 'info');
            this.elements.fullscreenChatInput.focus();
            this.animateButton(this.elements.fullscreenWriteBtn);
        }
        
        handleFullscreenSearch() {
            const query = this.elements.fullscreenChatInput.value.trim();
            if (query) {
                this.showNotification('Pesquisando', `Pesquisando por: "${query}"`, 'info');
                setTimeout(() => {
                    this.showNotification('Resultados', `Encontrados 5 resultados para "${query}"`, 'success');
                }, 1000);
                this.elements.fullscreenChatInput.value = '';
            } else {
                this.showNotification('Atenção', 'Digite algo para pesquisar!', 'warning');
                this.elements.fullscreenChatInput.focus();
            }
            this.animateButton(this.elements.fullscreenSearchBtn);
        }
        
        handleFullscreenFileUpload() {
            this.handleFileUploadHelper(this.elements.fullscreenChatInput);
            this.animateButton(this.elements.fullscreenFileBtn);
        }
        
        showFileNotification(file) {
            const fileName = file.name;
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            const fileType = file.type.split('/')[0];
            
            let icon = 'fa-file';
            if (fileType === 'image') icon = 'fa-image';
            else if (fileType === 'audio') icon = 'fa-music';
            else if (fileType === 'video') icon = 'fa-video';
            else if (file.name.endsWith('.pdf')) icon = 'fa-file-pdf';
            
            this.showNotification(
                'Arquivo selecionado',
                `${fileName}<br><small>Tamanho: ${fileSize} MB • Tipo: ${fileType || 'desconhecido'}</small>`,
                'success',
                icon
            );
        }
        
        handleShortcut(action) {
            if (this.shortcutActions[action]) {
                const { placeholder, message } = this.shortcutActions[action];
                this.elements.chatInput.placeholder = placeholder;
                this.elements.fullscreenChatInput.placeholder = placeholder;
                this.showNotification('Modo ativado', message, 'info');
                this.elements.chatInput.focus();
                this.elements.fullscreenChatInput.focus();
            }
        }
        
        showConfirmationModal() {
            this.elements.confirmationModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        hideConfirmationModal() {
            this.elements.confirmationModal.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        openAllPlatforms() {
            this.hideConfirmationModal();
            
            this.showNotification('Abrindo plataformas', 'Abrindo todas as plataformas em novas abas...', 'info', 'fa-external-link-alt');
            
            setTimeout(() => {
                this.platforms.forEach((platform, index) => {
                    setTimeout(() => {
                        window.open(platform, '_blank');
                    }, index * 300);
                });
            }, 1000);
            
            let count = 3;
            const countdown = setInterval(() => {
                this.showNotification(`Abrindo em ${count}...`, `${count} segundos para abrir todas as plataformas`, 'info', 'fa-clock');
                count--;
                
                if (count < 0) {
                    clearInterval(countdown);
                }
            }, 1000);
        }
        
        // NOVA FUNÇÃO: Enviar mensagem no fullscreen
        sendFullscreenMessage() {
            const message = this.elements.fullscreenChatInput.value.trim();
            if (!message) return;
            
            this.addFullscreenMessage('user', message);
            this.elements.fullscreenChatInput.value = '';
            this.showFullscreenTypingIndicator();
            
            setTimeout(() => {
                this.hideFullscreenTypingIndicator();
                const resposta = this.gerarRespostaEspecializada(message);
                this.addFullscreenMessage('ai', resposta);
                this.scrollFullscreenToBottom();
                
                // Responder com voz se a síntese de voz estiver ativa
                if (this.state.speechActive) {
                    this.speakResponse(resposta);
                }
            }, 1500);
            
            this.animateButton(this.elements.fullscreenSendBtn);
        }
        
        // NOVA FUNÇÃO: Gerar resposta especializada
        gerarRespostaEspecializada(pergunta) {
            const perguntaLower = pergunta.toLowerCase().trim();
            
            // Procura por correspondência exata ou parcial
            for (let i = 0; i < this.perguntas.length; i++) {
                const perguntaPadrao = this.perguntas[i].toLowerCase();
                
                // Verifica se a pergunta do usuário contém palavras-chave da pergunta padrão
                const palavrasChave = perguntaPadrao.split(' ');
                let correspondencia = 0;
                
                for (const palavra of palavrasChave) {
                    if (palavra.length > 3 && perguntaLower.includes(palavra)) {
                        correspondencia++;
                    }
                }
                
                // Se houver boa correspondência, retorna a resposta
                if (correspondencia >= palavrasChave.length * 0.5) {
                    return this.respostas[i];
                }
            }
            
            // Se não encontrou correspondência, gera resposta genérica
            const respostasGenericas = [
                "Entendi sua pergunta sobre ventilação mecânica/neonatologia! Posso ajudar com informações mais específicas se você reformular sua pergunta.",
                "Interessante! Como especialista em ventilação mecânica, posso elaborar mais sobre isso. Você pode me perguntar sobre: CPAP, PEEP, FiO2, ventilação não invasiva, ou cuidados neonatais.",
                "Sua pergunta é relevante para a área respiratória. Posso fornecer informações sobre ventilação mecânica, monitorização de pacientes, parâmetros ventilatorios ou cuidados com recém-nascidos."
            ];
            
            return respostasGenericas[Math.floor(Math.random() * respostasGenericas.length)];
        }
        
        addFullscreenMessage(sender, text) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${sender}-message`;
            
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            messageDiv.innerHTML = `
                <div class="chat-avatar">
                    <i class="fas fa-${sender === 'user' ? 'user' : 'robot'}"></i>
                </div>
                <div class="chat-content">
                    <div class="chat-sender">${sender === 'user' ? 'Você' : 'Reelmi AI'}</div>
                    <div class="chat-text">${this.formatMessageText(text)}</div>
                    <div class="chat-time">${time}</div>
                </div>
            `;
            
            this.elements.chatMessagesArea.appendChild(messageDiv);
            this.state.fullscreenChatMessages.push({ sender, text, time });
            this.scrollFullscreenToBottom();
        }
        
        showFullscreenTypingIndicator() {
            this.elements.typingIndicator.style.display = 'flex';
        }
        
        hideFullscreenTypingIndicator() {
            this.elements.typingIndicator.style.display = 'none';
        }
        
        scrollFullscreenToBottom() {
            this.elements.chatMessagesArea.scrollTop = this.elements.chatMessagesArea.scrollHeight;
        }
        
        formatMessageText(text) {
            text = text.replace(/\n/g, '<br>');
            
            const codeBlocks = text.match(/```([\s\S]*?)```/g);
            if (codeBlocks) {
                codeBlocks.forEach(block => {
                    const code = block.replace(/```/g, '');
                    const formattedCode = `<pre style="background: rgba(0,0,0,0.2); padding: 8px; border-radius: 6px; overflow-x: auto; margin: 6px 0;"><code style="font-family: monospace; font-size: 13px;">${code.trim()}</code></pre>`;
                    text = text.replace(block, formattedCode);
                });
            }
            
            return text;
        }
        
        toggleFeaturesPanel(forceState) {
            if (forceState !== undefined) {
                this.state.featuresPanelOpen = forceState;
            } else {
                this.state.featuresPanelOpen = !this.state.featuresPanelOpen;
            }
            
            if (this.state.featuresPanelOpen) {
                this.elements.featuresBtn.classList.add('active');
                this.elements.featuresPanel.style.display = 'block';
                setTimeout(() => {
                    this.elements.featuresPanel.style.opacity = '1';
                    this.elements.featuresPanel.style.transform = 'translateY(0)';
                }, 10);
            } else {
                this.elements.featuresBtn.classList.remove('active');
                this.elements.featuresPanel.style.opacity = '0';
                this.elements.featuresPanel.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    this.elements.featuresPanel.style.display = 'none';
                }, 300);
            }
        }
        
        showNotification(title, message, type = 'info', icon = null) {
            const notificationId = Date.now();
            
            let notificationIcon = 'fa-info-circle';
            if (icon) notificationIcon = icon;
            else if (type === 'success') notificationIcon = 'fa-check-circle';
            else if (type === 'warning') notificationIcon = 'fa-exclamation-triangle';
            else if (type === 'error') notificationIcon = 'fa-times-circle';
            
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.id = `notification-${notificationId}`;
            notification.setAttribute('role', 'alert');
            notification.setAttribute('aria-live', 'polite');
            
            notification.innerHTML = `
                <i class="fas ${notificationIcon} notification-icon"></i>
                <div class="notification-content">
                    <div class="notification-title">${title}</div>
                    <div class="notification-message">${message}</div>
                </div>
                <button class="notification-close" aria-label="Fechar notificação">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            document.body.appendChild(notification);
            
            const closeBtn = notification.querySelector('.notification-close');
            closeBtn.addEventListener('click', () => {
                this.closeNotification(notificationId);
            });
            
            setTimeout(() => {
                this.closeNotification(notificationId);
            }, 4500);
            
            this.state.notifications.push(notificationId);
            this.positionNotifications();
        }
        
        closeNotification(id) {
            const notification = document.getElementById(`notification-${id}`);
            if (notification) {
                notification.classList.add('fade-out');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                    this.state.notifications = this.state.notifications.filter(nid => nid !== id);
                    this.positionNotifications();
                }, 500);
            }
        }
        
        positionNotifications() {
            const notifications = document.querySelectorAll('.notification:not(.fade-out)');
            let top = 15;
            
            notifications.forEach(notification => {
                notification.style.top = `${top}px`;
                top += notification.offsetHeight + 8;
            });
        }
        
        animateButton(button) {
            button.style.transform = 'scale(0.95)';
            
            const rect = button.getBoundingClientRect();
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
            `;
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                button.style.transform = '';
            }, 120);
            
            setTimeout(() => {
                if (ripple.parentNode === button) {
                    button.removeChild(ripple);
                }
            }, 500);
        }
    }

    // INICIALIZAR APLICAÇÃO
    document.addEventListener('DOMContentLoaded', () => {
        const app = new AIChatInterface();
        
        window.aiChatApp = app;
        
        const focusStyles = document.createElement('style');
        focusStyles.textContent = `
            .keyboard-focus {
                outline: 2px solid #00dbde !important;
                outline-offset: 2px !important;
                box-shadow: 0 0 0 2px rgba(0, 219, 222, 0.2) !important;
            }
        `;
        document.head.appendChild(focusStyles);
        
        setTimeout(() => {
            app.showNotification(
                'Bem-vindo ao Reelmi AI!',
                'Especialista em ventilação mecânica e neonatologia. Clique em "Chat Inteligente" na sidebar para começar.',
                'info',
                'fa-robot'
            );
        }, 1000);
    });
    </script>
</body>
</html>
