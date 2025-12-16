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
        display: none;
    }

    .sidebar-close-btn:hover {
        background: rgba(67, 97, 238, 0.3);
        transform: scale(1.1);
    }

    .sidebar-header {
        padding: 0 20px 15px 20px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        position: relative;
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

    /* SIDEBAR FOOTER APRIMORADA PARA LUÍZA */
    .sidebar-footer {
        padding: 15px 15px 0 15px;
        border-top: 1px solid var(--border-color);
        margin-top: auto;
    }

    .user-profile {
        position: relative;
        padding: 15px;
        background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(58, 12, 163, 0.1));
        border-radius: 16px;
        margin-bottom: 15px;
        border: 1px solid rgba(67, 97, 238, 0.2);
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
        overflow: hidden;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-info h4 {
        font-size: 15px;
        margin-bottom: 5px;
        color: var(--text-primary);
    }

    .user-info > p {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #10a37f;
        margin-bottom: 8px;
    }

    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .status-indicator.online {
        background: #10a37f;
        box-shadow: 0 0 0 2px rgba(16, 163, 127, 0.3);
    }

    .user-stats {
        display: flex;
        gap: 12px;
        margin-top: 8px;
    }

    .stat {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        color: var(--text-muted);
    }

    .stat i {
        font-size: 10px;
    }

    .user-menu-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        color: var(--text-muted);
        cursor: pointer;
        padding: 5px;
        border-radius: 5px;
        transition: var(--transition);
    }

    .user-menu-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
    }

    .user-menu {
        position: absolute;
        bottom: 80px;
        left: 15px;
        right: 15px;
        background: var(--card-bg);
        border-radius: 12px;
        padding: 8px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        z-index: 1000;
        display: none;
        flex-direction: column;
        gap: 5px;
    }

    .user-menu.active {
        display: flex;
    }

    .user-menu-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        transition: var(--transition);
        font-size: 13px;
    }

    .user-menu-item:hover {
        background: rgba(67, 97, 238, 0.12);
        color: var(--text-primary);
    }

    .user-menu-item.logout {
        color: #f72585;
    }

    .user-menu-divider {
        height: 1px;
        background: var(--border-color);
        margin: 5px 0;
    }

    .sidebar-controls {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .sidebar-control-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        font-size: 13px;
        position: relative;
    }

    .sidebar-control-btn:hover {
        background: rgba(67, 97, 238, 0.1);
        transform: translateX(3px);
    }

    .sidebar-control-btn .toggle-switch {
        margin-left: auto;
        width: 36px;
        height: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }

    .sidebar-control-btn .toggle-switch.active {
        background: #00dbde;
    }

    .sidebar-control-btn .toggle-switch::before {
        content: '';
        position: absolute;
        top: 3px;
        left: 3px;
        width: 14px;
        height: 14px;
        background: white;
        border-radius: 50%;
        transition: var(--transition);
    }

    .sidebar-control-btn .toggle-switch.active::before {
        transform: translateX(16px);
    }

    .sidebar-control-btn .badge {
        position: absolute;
        right: 12px;
        top: 8px;
        background: var(--danger-gradient);
        color: white;
        font-size: 9px;
        padding: 2px 5px;
        border-radius: 10px;
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

    /* BOTÕES DE CONTROLE NO HEADER */
    .header-controls {
        position: absolute;
        top: 0;
        right: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 1002;
    }

    .theme-btn {
        background: rgba(67, 97, 238, 0.1);
        border: 1.5px solid rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        width: 38px;
        height: 38px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 16px;
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

    .features-btn {
        background: rgba(67, 97, 238, 0.1);
        border: 1.5px solid rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        width: 38px;
        height: 38px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 16px;
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

    /* CONTROLES DE FONTE */
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

    /* TOOLTIP PARA BOTÕES */
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

    /* INPUT SECTION */
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

    /* BOTÕES REDONDOS */
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

    .btn-round:hover .btn-tooltip {
        opacity: 1;
        visibility: visible;
        bottom: -32px;
    }

    /* BOTÕES NORMAIS */
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

    /* SHORTCUTS */
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

    /* SEÇÃO DE PLATAFORMAS */
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

    /* CARROSSEL DE PLATAFORMAS */
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

    /* NAVEGAÇÃO DO CARROSSEL */
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

    /* INDICADORES DO CARROSSEL */
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

    /* FOOTER */
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

    /* NOTIFICAÇÕES */
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

    /* MODAL */
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

    /* LOADER */
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

    /* CHAT FULLSCREEN APRIMORADO */
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

    .chat-container {
        display: flex;
        height: 100vh;
        background: var(--dark-bg);
    }

    .chat-sidebar {
        width: 280px;
        background: var(--sidebar-bg);
        border-right: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-sidebar-header {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-sidebar-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .chat-sidebar-user .user-avatar.small {
        width: 40px;
        height: 40px;
    }

    .chat-sidebar-user h3 {
        font-size: 16px;
        margin-bottom: 3px;
        color: var(--text-primary);
    }

    .chat-sidebar-user p {
        font-size: 12px;
        color: var(--text-muted);
    }

    .new-chat-btn {
        background: var(--primary-gradient);
        color: white;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .new-chat-btn:hover {
        transform: scale(1.05);
    }

    .chat-search {
        padding: 15px 20px;
        border-bottom: 1px solid var(--border-color);
        position: relative;
    }

    .chat-search i {
        position: absolute;
        left: 35px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 14px;
    }

    .chat-search input {
        width: 100%;
        padding: 10px 15px 10px 35px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        color: var(--text-primary);
        font-size: 13px;
        outline: none;
    }

    .chat-search input:focus {
        border-color: rgba(67, 97, 238, 0.5);
    }

    .chat-conversations {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
    }

    .conversation {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border-radius: 12px;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 5px;
        border: 1px solid transparent;
    }

    .conversation:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .conversation.active {
        background: rgba(67, 97, 238, 0.15);
        border-color: rgba(67, 97, 238, 0.3);
    }

    .conversation-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(67, 97, 238, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4361ee;
        font-size: 16px;
    }

    .conversation-info {
        flex: 1;
    }

    .conversation-info h4 {
        font-size: 14px;
        margin-bottom: 3px;
        color: var(--text-primary);
    }

    .conversation-info p {
        font-size: 12px;
        color: var(--text-muted);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px;
    }

    .conversation-time {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 3px;
        display: block;
    }

    .unread-count {
        background: var(--danger-gradient);
        color: white;
        font-size: 11px;
        padding: 2px 6px;
        border-radius: 10px;
        min-width: 18px;
        text-align: center;
    }

    .chat-actions {
        padding: 15px;
        border-top: 1px solid var(--border-color);
        display: flex;
        gap: 10px;
    }

    .chat-action-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        font-size: 13px;
    }

    .chat-action-btn:hover {
        background: rgba(67, 97, 238, 0.1);
    }

    .chat-main-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-header {
        padding: 15px 25px;
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-partner {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .chat-partner-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: var(--accent-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .chat-partner-info h2 {
        font-size: 18px;
        margin-bottom: 3px;
        color: var(--text-primary);
    }

    .chat-status {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .chat-header-right {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .chat-header-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .chat-header-btn:hover {
        background: rgba(67, 97, 238, 0.1);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .chat-header-dropdown {
        position: relative;
    }

    .chat-dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        width: 200px;
        background: var(--card-bg);
        border-radius: 12px;
        padding: 8px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
        display: none;
        z-index: 1000;
    }

    .chat-dropdown-menu.active {
        display: block;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        transition: var(--transition);
        font-size: 13px;
    }

    .dropdown-item:hover {
        background: rgba(67, 97, 238, 0.12);
        color: var(--text-primary);
    }

    .dropdown-divider {
        height: 1px;
        background: var(--border-color);
        margin: 5px 0;
    }

    .dropdown-item.text-danger {
        color: #f72585;
    }

    .dropdown-item.text-danger:hover {
        background: rgba(247, 37, 133, 0.1);
    }

    .chat-messages-area {
        flex: 1;
        overflow-y: auto;
        padding: 25px;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(26, 26, 46, 0.8));
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .chat-date-divider {
        text-align: center;
        margin: 15px 0;
        position: relative;
    }

    .chat-date-divider::before,
    .chat-date-divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 35%;
        height: 1px;
        background: var(--border-color);
    }

    .chat-date-divider::before {
        left: 0;
    }

    .chat-date-divider::after {
        right: 0;
    }

    .chat-date-divider span {
        background: var(--card-bg);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        color: var(--text-muted);
        border: 1px solid var(--border-color);
    }

    .chat-message {
        display: flex;
        gap: 12px;
        max-width: 75%;
        animation: messageAppear 0.3s ease;
    }

    @keyframes messageAppear {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .user-message {
        align-self: flex-end;
        flex-direction: row-reverse;
    }

    .message-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        overflow: hidden;
    }

    .user-message .message-avatar {
        background: var(--accent-gradient);
    }

    .message-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .message-content {
        background: rgba(67, 97, 238, 0.1);
        border-radius: 18px;
        padding: 15px;
        position: relative;
        border: 1px solid rgba(67, 97, 238, 0.2);
        min-width: 250px;
    }

    .ai-message .message-content {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 255, 255, 0.1);
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .message-sender {
        font-weight: 700;
        font-size: 14px;
        color: var(--text-primary);
    }

    .message-time {
        font-size: 11px;
        color: var(--text-muted);
    }

    .message-actions {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 5px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .message-content:hover .message-actions {
        opacity: 1;
    }

    .message-action-btn {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: var(--text-secondary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .message-action-btn:hover {
        background: rgba(67, 97, 238, 0.8);
        color: white;
    }

    .message-text {
        color: var(--text-secondary);
        line-height: 1.6;
        font-size: 14px;
    }

    .message-text p {
        margin-bottom: 10px;
    }

    .message-text ul {
        padding-left: 20px;
        margin: 10px 0;
    }

    .message-text li {
        margin-bottom: 5px;
    }

    .medical-protocol {
        background: rgba(15, 52, 96, 0.5);
        border-radius: 12px;
        padding: 15px;
        margin: 15px 0;
        border: 1px solid rgba(0, 219, 222, 0.2);
    }

    .medical-protocol h4 {
        color: #00dbde;
        margin-bottom: 12px;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .protocol-params {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .param {
        display: flex;
        justify-content: space-between;
        padding: 8px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
    }

    .param-label {
        color: var(--text-secondary);
        font-size: 13px;
    }

    .param-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 13px;
    }

    .message-alert {
        display: flex;
        gap: 10px;
        padding: 12px;
        border-radius: 10px;
        margin: 15px 0;
        background: rgba(16, 163, 127, 0.1);
        border: 1px solid rgba(16, 163, 127, 0.2);
    }

    .message-alert.info {
        background: rgba(0, 219, 222, 0.1);
        border-color: rgba(0, 219, 222, 0.2);
    }

    .message-alert i {
        color: #00dbde;
        font-size: 16px;
        margin-top: 2px;
    }

    .message-alert p {
        flex: 1;
        font-size: 13px;
        color: var(--text-secondary);
        line-height: 1.5;
    }

    .message-reactions {
        display: flex;
        gap: 5px;
        margin-top: 10px;
    }

    .reaction-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        padding: 3px 8px;
        font-size: 12px;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
    }

    .reaction-btn:hover {
        background: rgba(67, 97, 238, 0.1);
        transform: translateY(-2px);
    }

    .message-status {
        text-align: right;
        margin-top: 5px;
    }

    .message-status i {
        font-size: 12px;
        color: var(--text-muted);
    }

    .message-status i.read {
        color: #00dbde;
    }

    .message-suggestions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 15px;
    }

    .suggestion-btn {
        background: rgba(67, 97, 238, 0.15);
        border: 1px solid rgba(67, 97, 238, 0.3);
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        color: var(--text-primary);
        cursor: pointer;
        transition: var(--transition);
    }

    .suggestion-btn:hover {
        background: rgba(67, 97, 238, 0.25);
        transform: translateY(-2px);
    }

    .typing-indicator {
        display: flex;
        gap: 12px;
        align-items: center;
        padding: 15px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 18px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        max-width: 200px;
    }

    .typing-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--accent-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }

    .typing-content p {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 5px;
    }

    .typing-dots {
        display: flex;
        gap: 4px;
    }

    .typing-dots span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #00dbde;
        animation: typingDot 1.4s infinite ease-in-out;
    }

    .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
    .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typingDot {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1); }
    }

    .chat-input-area {
        padding: 20px 25px;
        background: var(--card-bg);
        border-top: 1px solid var(--border-color);
    }

    .input-tools {
        display: flex;
        gap: 8px;
        margin-bottom: 15px;
    }

    .input-tool-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .input-tool-btn:hover {
        background: rgba(67, 97, 238, 0.1);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .chat-input-wrapper {
        display: flex;
        gap: 12px;
        align-items: flex-end;
    }

    .chat-input {
        flex: 1;
        min-height: 45px;
        max-height: 120px;
        padding: 12px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 22px;
        color: var(--text-primary);
        font-size: 14px;
        outline: none;
        overflow-y: auto;
        transition: var(--transition);
    }

    .chat-input:focus {
        border-color: rgba(0, 219, 222, 0.5);
        box-shadow: 0 0 0 2px rgba(0, 219, 222, 0.1);
    }

    .chat-input[placeholder]:empty:before {
        content: attr(placeholder);
        color: var(--text-muted);
    }

    .input-actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .action-btn:hover {
        background: rgba(67, 97, 238, 0.1);
        transform: translateY(-2px);
    }

    .action-btn.send-btn {
        background: var(--primary-gradient);
        color: white;
        width: auto;
        padding: 0 20px;
        border-radius: 22px;
        display: flex;
        gap: 8px;
    }

    .action-btn.send-btn:hover {
        background: linear-gradient(135deg, #3a56d4, #2e0a8a);
        transform: translateY(-2px);
    }

    .quick-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .quick-action-btn {
        padding: 8px 16px;
        background: rgba(67, 97, 238, 0.1);
        border: 1px solid rgba(67, 97, 238, 0.2);
        border-radius: 20px;
        color: var(--text-primary);
        font-size: 13px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .quick-action-btn:hover {
        background: rgba(67, 97, 238, 0.2);
        transform: translateY(-2px);
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

    /* TEMAS CLARO/ESCURO */
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

    /* RESPONSIVIDADE */
    @media (max-width: 1200px) {
        .container {
            max-width: 100%;
            padding: 22px 18px;
        }
        
        .carousel-nav {
            display: none;
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
        
        .chat-message {
            max-width: 85%;
        }
        
        .protocol-params {
            grid-template-columns: 1fr;
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
            width: 36px;
            height: 36px;
            font-size: 15px;
        }
        
        .chat-sidebar {
            position: fixed;
            left: -280px;
            top: 0;
            height: 100vh;
            z-index: 2001;
            transition: left 0.3s ease;
        }
        
        .chat-sidebar.active {
            left: 0;
        }
        
        .chat-message {
            max-width: 90%;
        }
        
        .chat-header {
            padding: 12px 15px;
        }
        
        .chat-header-btn {
            width: 36px;
            height: 36px;
        }
        
        .chat-messages-area {
            padding: 15px;
        }
        
        .chat-input-area {
            padding: 15px;
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
            width: 34px;
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
        
        .chat-message {
            max-width: 95%;
        }
        
        .message-content {
            padding: 12px;
        }
        
        .medical-protocol {
            padding: 12px;
        }
        
        .quick-actions {
            justify-content: center;
        }
        
        .quick-action-btn {
            padding: 6px 12px;
            font-size: 12px;
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

    /* EFEITO DE BRILHO NOS CARDS */
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

    /* Modal de perguntas rápidas */
    .quick-questions-modal {
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
        backdrop-filter: blur(5px);
    }

    .quick-questions-content {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 25px;
        max-width: 400px;
        width: 90%;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-color);
    }

    .quick-questions-content h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quick-questions-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin: 15px 0;
    }

    .quick-question-item {
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        cursor: pointer;
        transition: var(--transition);
        color: var(--text-secondary);
        font-size: 14px;
    }

    .quick-question-item:hover {
        background: rgba(67, 97, 238, 0.15);
        color: var(--text-primary);
        transform: translateX(5px);
        border-color: rgba(67, 97, 238, 0.3);
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }
</style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
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
        
        <!-- SIDEBAR FOOTER PARA LUÍZA -->
        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Luiza" alt="Avatar Luiza">
                </div>
                <div class="user-info">
                    <h4>Luiza Medeiros</h4>
                    <p><span class="status-indicator online"></span> Online agora</p>
                    <div class="user-stats">
                        <div class="stat">
                            <i class="fas fa-comment"></i>
                            <span>24 chats</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-star"></i>
                            <span>Premium</span>
                        </div>
                    </div>
                </div>
                <button class="user-menu-btn" id="userMenuBtn">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            
            <!-- Menu de usuário expandido -->
            <div class="user-menu" id="userMenu">
                <a href="#" class="user-menu-item">
                    <i class="fas fa-user-circle"></i>
                    <span>Meu Perfil</span>
                </a>
                <a href="#" class="user-menu-item">
                    <i class="fas fa-cog"></i>
                    <span>Configurações</span>
                </a>
                <a href="#" class="user-menu-item">
                    <i class="fas fa-history"></i>
                    <span>Histórico</span>
                    <span class="badge">12</span>
                </a>
                <a href="#" class="user-menu-item">
                    <i class="fas fa-download"></i>
                    <span>Exportar Dados</span>
                </a>
                <div class="user-menu-divider"></div>
                <a href="#" class="user-menu-item logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            </div>
            
            <!-- Controles adicionais na sidebar -->
            <div class="sidebar-controls">
                <button class="sidebar-control-btn" id="nightModeToggle">
                    <i class="fas fa-moon"></i>
                    <span>Modo Noturno</span>
                    <div class="toggle-switch active"></div>
                </button>
                <button class="sidebar-control-btn" id="notificationToggle">
                    <i class="fas fa-bell"></i>
                    <span>Notificações</span>
                    <div class="toggle-switch active"></div>
                    <span class="badge">3</span>
                </button>
                <button class="sidebar-control-btn" id="privacyToggle">
                    <i class="fas fa-shield-alt"></i>
                    <span>Privacidade</span>
                </button>
            </div>
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

        <!-- CHAT FULLSCREEN APRIMORADO -->
        <div class="chat-fullscreen" id="chatFullscreen">
            <div class="chat-container">
                <!-- Sidebar do chat -->
                <div class="chat-sidebar">
                    <div class="chat-sidebar-header">
                        <div class="chat-sidebar-user">
                            <div class="user-avatar small">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Luiza" alt="Luiza">
                            </div>
                            <div>
                                <h3>Conversas de Luiza</h3>
                                <p>Especialista em Neonatologia</p>
                            </div>
                        </div>
                        <button class="new-chat-btn" id="newChatSidebarBtn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    
                    <div class="chat-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Buscar conversas..." id="chatSearchInput">
                    </div>
                    
                    <div class="chat-conversations">
                        <div class="conversation active" data-id="ventilacao">
                            <div class="conversation-icon">
                                <i class="fas fa-lungs"></i>
                            </div>
                            <div class="conversation-info">
                                <h4>Ventilação Mecânica</h4>
                                <p>Discussão sobre PEEP e CPAP</p>
                                <span class="conversation-time">10:30</span>
                            </div>
                            <span class="unread-count">3</span>
                        </div>
                        
                        <div class="conversation" data-id="neonatal">
                            <div class="conversation-icon">
                                <i class="fas fa-baby"></i>
                            </div>
                            <div class="conversation-info">
                                <h4>Cuidados Neonatais</h4>
                                <p>Protocolos de oxigenoterapia</p>
                                <span class="conversation-time">Ontem</span>
                            </div>
                        </div>
                        
                        <div class="conversation" data-id="protocolos">
                            <div class="conversation-icon">
                                <i class="fas fa-file-medical"></i>
                            </div>
                            <div class="conversation-info">
                                <h4>Protocolos Hospitalares</h4>
                                <p>Revisão de procedimentos</p>
                                <span class="conversation-time">12/04</span>
                            </div>
                        </div>
                        
                        <div class="conversation" data-id="emergencia">
                            <div class="conversation-icon">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <div class="conversation-info">
                                <h4>Emergências Respiratórias</h4>
                                <p>Casos complexos discutidos</p>
                                <span class="conversation-time">10/04</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chat-actions">
                        <button class="chat-action-btn" id="exportChatBtn">
                            <i class="fas fa-download"></i>
                            <span>Exportar</span>
                        </button>
                        <button class="chat-action-btn" id="clearAllChatsBtn">
                            <i class="fas fa-trash-alt"></i>
                            <span>Limpar Tudo</span>
                        </button>
                    </div>
                </div>
                
                <!-- Área principal do chat -->
                <div class="chat-main-area">
                    <!-- Header do chat -->
                    <div class="chat-header">
                        <div class="chat-header-left">
                            <div class="chat-partner">
                                <div class="chat-partner-avatar">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="chat-partner-info">
                                    <h2>Reelmi AI</h2>
                                    <p class="chat-status">
                                        <span class="status-indicator online"></span>
                                        Online • Especialista em Ventilação Mecânica
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="chat-header-right">
                            <button class="chat-header-btn" id="chatVoiceCallBtn" title="Chamada de voz">
                                <i class="fas fa-phone-alt"></i>
                            </button>
                            <button class="chat-header-btn" id="chatVideoCallBtn" title="Videoconferência">
                                <i class="fas fa-video"></i>
                            </button>
                            <button class="chat-header-btn" id="chatInfoBtn" title="Informações">
                                <i class="fas fa-info-circle"></i>
                            </button>
                            <div class="chat-header-dropdown">
                                <button class="chat-header-btn" id="chatMenuBtn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="chat-dropdown-menu" id="chatDropdownMenu">
                                    <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Adicionar colaboradores</a>
                                    <a href="#" class="dropdown-item"><i class="fas fa-print"></i> Imprimir conversa</a>
                                    <a href="#" class="dropdown-item"><i class="fas fa-archive"></i> Arquivar</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-danger" id="clearChatBtn"><i class="fas fa-trash-alt"></i> Limpar chat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Área de mensagens -->
                    <div class="chat-messages-area" id="chatMessagesArea">
                        <!-- Mensagem de boas-vindas -->
                        <div class="chat-date-divider">
                            <span>Hoje, 15 de Abril</span>
                        </div>
                        
                        <div class="chat-message ai-message">
                            <div class="message-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-sender">Reelmi AI</span>
                                    <span class="message-time">10:30 AM</span>
                                    <div class="message-actions">
                                        <button class="message-action-btn" title="Copiar">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                        <button class="message-action-btn" title="Responder">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button class="message-action-btn" title="Salvar">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="message-text">
                                    <p>Olá <strong>Luiza</strong>! 👋</p>
                                    <p>Eu sou o <strong>Reelmi AI</strong>, seu especialista em ventilação mecânica e neonatologia.</p>
                                    <p>Estou aqui para ajudá-la com:</p>
                                    <ul>
                                        <li>📊 Análise de parâmetros ventilatorios</li>
                                        <li>👶 Protocolos de cuidados neonatais</li>
                                        <li>💡 Otimização de configurações de PEEP/CPAP</li>
                                        <li>📈 Interpretação de dados respiratórios</li>
                                    </ul>
                                    <p>Como posso ajudá-la hoje?</p>
                                </div>
                                <div class="message-reactions">
                                    <button class="reaction-btn">👍</button>
                                    <button class="reaction-btn">❤️</button>
                                    <button class="reaction-btn">😮</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Exemplo de mensagem do usuário -->
                        <div class="chat-message user-message">
                            <div class="message-avatar">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Luiza" alt="Luiza">
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-sender">Você</span>
                                    <span class="message-time">10:32 AM</span>
                                    <div class="message-actions">
                                        <button class="message-action-btn" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="message-action-btn" title="Excluir">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="message-text">
                                    <p>Preciso de ajuda com um caso de SDRA em prematuro de 32 semanas. Quais parâmetros você sugere para ventilação mecânica?</p>
                                </div>
                                <div class="message-status">
                                    <i class="fas fa-check-double read"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Exemplo de resposta da IA -->
                        <div class="chat-message ai-message">
                            <div class="message-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-sender">Reelmi AI</span>
                                    <span class="message-time">10:33 AM</span>
                                    <div class="message-actions">
                                        <button class="message-action-btn" title="Copiar">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                        <button class="message-action-btn" title="Responder">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="message-text">
                                    <p>Para <strong>SDRA em prematuro de 32 semanas</strong>, sugiro:</p>
                                    
                                    <div class="medical-protocol">
                                        <h4><i class="fas fa-stethoscope"></i> Protocolo Recomendado:</h4>
                                        <div class="protocol-params">
                                            <div class="param">
                                                <span class="param-label">Modo:</span>
                                                <span class="param-value">SIMV + PS</span>
                                            </div>
                                            <div class="param">
                                                <span class="param-label">PEEP:</span>
                                                <span class="param-value">6-8 cmH₂O</span>
                                            </div>
                                            <div class="param">
                                                <span class="param-label">FiO₂:</span>
                                                <span class="param-value">0.4-0.6 inicial</span>
                                            </div>
                                            <div class="param">
                                                <span class="param-label">Frequência:</span>
                                                <span class="param-value">40-50 rpm</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="message-alert info">
                                        <i class="fas fa-info-circle"></i>
                                        <p><strong>Importante:</strong> Monitorar saturação (SpO₂ 90-95%) e ajustar conforme gasometria arterial.</p>
                                    </div>
                                </div>
                                <div class="message-suggestions">
                                    <button class="suggestion-btn">Ver mais sobre PEEP</button>
                                    <button class="suggestion-btn">Protocolos neonatais</button>
                                    <button class="suggestion-btn">Calculadora ventilatoría</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Indicador de digitação -->
                        <div class="typing-indicator" id="typingIndicator">
                            <div class="typing-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="typing-content">
                                <div class="typing-dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <p>Reelmi AI está digitando...</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Área de entrada aprimorada -->
                    <div class="chat-input-area">
                        <div class="input-tools">
                            <button class="input-tool-btn" id="attachFileBtn" title="Anexar arquivo">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <button class="input-tool-btn" id="attachImageBtn" title="Enviar imagem">
                                <i class="fas fa-image"></i>
                            </button>
                            <button class="input-tool-btn" id="voiceInputBtn" title="Entrada por voz">
                                <i class="fas fa-microphone"></i>
                            </button>
                            <button class="input-tool-btn" id="formatTextBtn" title="Formatação">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button class="input-tool-btn" id="emojisBtn" title="Emojis">
                                <i class="fas fa-smile"></i>
                            </button>
                        </div>
                        
                        <div class="chat-input-wrapper">
                            <div class="chat-input" id="chatInputContent" contenteditable="true" 
                                 placeholder="Digite sua mensagem sobre ventilação mecânica ou neonatologia..."></div>
                            
                            <div class="input-actions">
                                <button class="action-btn" id="sendQuickQuestion" title="Perguntas rápidas">
                                    <i class="fas fa-bolt"></i>
                                </button>
                                <button class="action-btn send-btn" id="sendMessageBtn">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>Enviar</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="quick-actions">
                            <button class="quick-action-btn" data-action="ventilacao">
                                <i class="fas fa-lungs"></i>
                                Ventilação
                            </button>
                            <button class="quick-action-btn" data-action="cpap">
                                <i class="fas fa-wind"></i>
                                CPAP
                            </button>
                            <button class="quick-action-btn" data-action="peep">
                                <i class="fas fa-compress-arrows-alt"></i>
                                PEEP
                            </button>
                            <button class="quick-action-btn" data-action="oxigenio">
                                <i class="fas fa-atom"></i>
                                Oxigenação
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DASHBOARD PRINCIPAL -->
        <div class="container" id="mainContainer">
            <!-- HEADER -->
            <header class="header" role="banner">
                <div class="icon" aria-hidden="true">
                    <i class="fas fa-robot" id="headerIcon"></i>
                </div>
                <h1 id="greeting">Boa noite, como posso ajudar?</h1>
                <p id="headerDescription">Especialista em ventilação mecânica e neonatologia. Em que posso ser útil?</p>
                
                <!-- BOTÕES DE CONTROLE NO HEADER -->
                <div class="header-controls">
                    <button class="theme-btn" id="themeBtn" aria-label="Alternar tema claro/escuro">
                        <i class="fas fa-moon"></i>
                        <span class="btn-tooltip">Tema Escuro</span>
                    </button>
                    
                    <button class="features-btn" id="featuresBtn" aria-label="Funcionalidades">
                        <i class="fas fa-sliders-h"></i>
                        <span class="btn-tooltip">Funcionalidades</span>
                    </button>
                    
                    <!-- PAINEL DE FUNCIONALIDADES -->
                    <div class="features-panel" id="featuresPanel">
                        <h3><i class="fas fa-cog"></i> Funcionalidades</h3>
                        
                        <!-- CONTROLES DE FONTE -->
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
                "o que é suporte ventilatório avançado",
                "quando é necessário usar oxigênio em neonatal",
                "o que é suporte ventilatório invasivo",
                "quando deve ser usado insuflação no neonatal",
                "criar um código em python",
                "escrever um e-mail formal",
                "gerar uma imagem futurista",
                "resumir este texto"
            ];

            // LISTA DE RESPOSTAS ESPECIALIZADAS
            this.respostas = [
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
                "O suporte ventilatório avançado em neonatologia inclui modalidades como High-Frequency Oscillatory Ventilation (HFOV), High-Frequency Jet Ventilation (HFJV), ventilação com oscilação de volume, e suporte com óxido nítrico inalado. Estas técnicas são usadas quando a ventilação convencional não é suficiente para manter a oxigenação adequada em recém-nascidos críticos.",
                "O oxigênio em neonatologia deve ser usado quando a saturação periférica de oxigênio (SpO2) estiver abaixo de 90-92% em recém-nascidos a termo, ou conforme protocolos específicos para prematuros. É crucial monitorar frequentemente para evitar tanto a hipoxemia quanto a hiperoxemia, que pode causar retinopatia da prematuridade e lesão pulmonar.",
                "O suporte ventilatório invasivo em neonatos envolve a intubação endotraqueal e conexão a um ventilador mecânico. É indicado em casos de: apneia grave, insuficiência respiratória refratária a CPAP, necessidade de altas concentrações de oxigênio (FiO2 > 0.6-0.8), acidose respiratória grave (pH < 7.25), ou instabilidade hemodinâmica.",
                "A insuflação em neonatologia (como manobras de recrutamento alveolar) deve ser realizada com extrema cautela. Pressões de insuflação geralmente variam de 20-30 cmH2O por 10-20 segundos, mas devem ser individualizadas. Em prematuros extremos, pressões mais baixas (15-25 cmH2O) são recomendadas para prevenir barotrauma e volutrauma.",
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
            this.setupEnhancedChat();
        }
        
        cacheElements() {
            this.elements = {
                // Sidebar
                sidebar: document.getElementById('sidebar'),
                sidebarToggle: document.getElementById('sidebarToggle'),
                sidebarOverlay: document.getElementById('sidebarOverlay'),
                mainContent: document.getElementById('mainContent'),
                mainContainer: document.getElementById('mainContainer'),
                sidebarCloseBtn: document.getElementById('sidebarCloseBtn'),
                
                // Menu Sidebar
                sidebarMenuItems: document.querySelectorAll('.sidebar-menu-item'),
                chatInteligenteBtn: document.getElementById('chatInteligenteBtn'),
                newChatBtn: document.getElementById('newChatBtn'),
                
                // Sidebar Footer para Luíza
                userMenuBtn: document.getElementById('userMenuBtn'),
                userMenu: document.getElementById('userMenu'),
                nightModeToggle: document.getElementById('nightModeToggle'),
                notificationToggle: document.getElementById('notificationToggle'),
                privacyToggle: document.getElementById('privacyToggle'),
                
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
                
                // Chat Fullscreen Aprimorado
                chatFullscreen: document.getElementById('chatFullscreen'),
                newChatSidebarBtn: document.getElementById('newChatSidebarBtn'),
                chatSearchInput: document.getElementById('chatSearchInput'),
                exportChatBtn: document.getElementById('exportChatBtn'),
                clearAllChatsBtn: document.getElementById('clearAllChatsBtn'),
                chatVoiceCallBtn: document.getElementById('chatVoiceCallBtn'),
                chatVideoCallBtn: document.getElementById('chatVideoCallBtn'),
                chatInfoBtn: document.getElementById('chatInfoBtn'),
                chatMenuBtn: document.getElementById('chatMenuBtn'),
                chatDropdownMenu: document.getElementById('chatDropdownMenu'),
                chatMessagesArea: document.getElementById('chatMessagesArea'),
                attachFileBtn: document.getElementById('attachFileBtn'),
                attachImageBtn: document.getElementById('attachImageBtn'),
                voiceInputBtn: document.getElementById('voiceInputBtn'),
                formatTextBtn: document.getElementById('formatTextBtn'),
                emojisBtn: document.getElementById('emojisBtn'),
                sendQuickQuestion: document.getElementById('sendQuickQuestion'),
                sendMessageBtn: document.getElementById('sendMessageBtn'),
                chatInputContent: document.getElementById('chatInputContent'),
                quickActionBtns: document.querySelectorAll('.quick-action-btn'),
                conversations: document.querySelectorAll('.conversation')
            };
        }
        
        setupEnhancedChat() {
            // Menu do usuário
            if (this.elements.userMenuBtn && this.elements.userMenu) {
                this.elements.userMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.elements.userMenu.classList.toggle('active');
                });
                
                document.addEventListener('click', (e) => {
                    if (!this.elements.userMenu.contains(e.target) && 
                        !this.elements.userMenuBtn.contains(e.target)) {
                        this.elements.userMenu.classList.remove('active');
                    }
                });
            }
            
            // Menu do chat
            if (this.elements.chatMenuBtn && this.elements.chatDropdownMenu) {
                this.elements.chatMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.elements.chatDropdownMenu.classList.toggle('active');
                });
                
                document.addEventListener('click', (e) => {
                    if (!this.elements.chatDropdownMenu.contains(e.target) && 
                        !this.elements.chatMenuBtn.contains(e.target)) {
                        this.elements.chatDropdownMenu.classList.remove('active');
                    }
                });
            }
            
            // Botões do chat aprimorado
            if (this.elements.sendMessageBtn) {
                this.elements.sendMessageBtn.addEventListener('click', () => this.sendEnhancedMessage());
            }
            
            if (this.elements.chatInputContent) {
                this.elements.chatInputContent.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        this.sendEnhancedMessage();
                    }
                });
            }
            
            if (this.elements.voiceInputBtn) {
                this.elements.voiceInputBtn.addEventListener('click', () => this.toggleEnhancedVoiceInput());
            }
            
            if (this.elements.attachFileBtn) {
                this.elements.attachFileBtn.addEventListener('click', () => this.handleEnhancedFileUpload());
            }
            
            if (this.elements.attachImageBtn) {
                this.elements.attachImageBtn.addEventListener('click', () => this.handleEnhancedImageUpload());
            }
            
            if (this.elements.sendQuickQuestion) {
                this.elements.sendQuickQuestion.addEventListener('click', () => this.showQuickQuestions());
            }
            
            // Botões de ação rápida
            this.elements.quickActionBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const action = e.currentTarget.dataset.action;
                    this.handleQuickAction(action);
                    this.animateButton(e.currentTarget);
                });
            });
            
            // Conversas na sidebar
            this.elements.conversations.forEach(conv => {
                conv.addEventListener('click', () => {
                    this.elements.conversations.forEach(c => c.classList.remove('active'));
                    conv.classList.add('active');
                    
                    const conversationId = conv.dataset.id;
                    this.loadConversation(conversationId);
                });
            });
            
            // Botões de ação nas mensagens
            document.addEventListener('click', (e) => {
                if (e.target.closest('.message-action-btn')) {
                    const btn = e.target.closest('.message-action-btn');
                    const messageContent = btn.closest('.message-content');
                    
                    if (btn.querySelector('.fa-copy')) {
                        this.copyMessage(messageContent);
                    } else if (btn.querySelector('.fa-reply')) {
                        this.replyToMessage(messageContent);
                    } else if (btn.querySelector('.fa-star')) {
                        this.saveMessage(messageContent);
                    } else if (btn.querySelector('.fa-edit')) {
                        this.editMessage(messageContent);
                    } else if (btn.querySelector('.fa-trash-alt')) {
                        this.deleteMessage(messageContent);
                    }
                }
                
                // Reações às mensagens
                if (e.target.closest('.reaction-btn')) {
                    const btn = e.target.closest('.reaction-btn');
                    this.addReaction(btn);
                }
                
                // Sugestões
                if (e.target.closest('.suggestion-btn')) {
                    const btn = e.target.closest('.suggestion-btn');
                    this.handleSuggestion(btn.textContent);
                }
            });
            
            // Novo chat na sidebar
            if (this.elements.newChatSidebarBtn) {
                this.elements.newChatSidebarBtn.addEventListener('click', () => {
                    this.clearEnhancedChat();
                });
            }
            
            // Exportar chat
            if (this.elements.exportChatBtn) {
                this.elements.exportChatBtn.addEventListener('click', () => {
                    this.exportChat();
                });
            }
            
            // Limpar todos os chats
            if (this.elements.clearAllChatsBtn) {
                this.elements.clearAllChatsBtn.addEventListener('click', () => {
                    this.clearAllChats();
                });
            }
        }
        
        sendEnhancedMessage() {
            const message = this.elements.chatInputContent.textContent.trim();
            if (!message) return;
            
            // Adiciona mensagem do usuário
            this.addEnhancedMessage('user', message);
            
            // Limpa o input
            this.elements.chatInputContent.textContent = '';
            
            // Mostra indicador de digitação
            this.showEnhancedTypingIndicator();
            
            // Gera resposta após delay
            setTimeout(() => {
                this.hideEnhancedTypingIndicator();
                const resposta = this.gerarRespostaEspecializada(message);
                this.addEnhancedMessage('ai', resposta);
                this.scrollToBottom();
                
                // Responde com voz se ativo
                if (this.state.speechActive) {
                    this.speakResponse(resposta);
                }
            }, 1500);
            
            this.animateButton(this.elements.sendMessageBtn);
        }
        
        addEnhancedMessage(sender, text) {
            const messagesArea = document.getElementById('chatMessagesArea');
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${sender}-message`;
            
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const avatar = sender === 'user' 
                ? '<img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Luiza" alt="Luiza">'
                : '<i class="fas fa-robot"></i>';
            
            const senderName = sender === 'user' ? 'Você' : 'Reelmi AI';
            
            // Formatação especial para respostas médicas
            let formattedText = this.formatMedicalResponse(text);
            
            messageDiv.innerHTML = `
                <div class="message-avatar">
                    ${avatar}
                </div>
                <div class="message-content">
                    <div class="message-header">
                        <span class="message-sender">${senderName}</span>
                        <span class="message-time">${time}</span>
                        <div class="message-actions">
                            ${sender === 'ai' ? `
                                <button class="message-action-btn" title="Copiar">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <button class="message-action-btn" title="Responder">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="message-action-btn" title="Salvar">
                                    <i class="fas fa-star"></i>
                                </button>
                            ` : `
                                <button class="message-action-btn" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="message-action-btn" title="Excluir">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            `}
                        </div>
                    </div>
                    <div class="message-text">
                        ${formattedText}
                    </div>
                    ${sender === 'user' ? `
                        <div class="message-status">
                            <i class="fas fa-check-double read"></i>
                        </div>
                    ` : `
                        <div class="message-reactions">
                            <button class="reaction-btn">👍</button>
                            <button class="reaction-btn">❤️</button>
                            <button class="reaction-btn">😮</button>
                        </div>
                        <div class="message-suggestions">
                            <button class="suggestion-btn">Ver mais sobre PEEP</button>
                            <button class="suggestion-btn">Protocolos neonatais</button>
                            <button class="suggestion-btn">Calculadora ventilatoría</button>
                        </div>
                    `}
                </div>
            `;
            
            messagesArea.appendChild(messageDiv);
            this.scrollToBottom();
        }
        
        formatMedicalResponse(text) {
            // Detecta se é uma resposta médica e formata apropriadamente
            const medicalKeywords = ['peep', 'cpap', 'fio2', 'ventilação', 'neonatal', 'sdra', 'pressão', 'oxigênio'];
            const hasMedicalTerms = medicalKeywords.some(keyword => 
                text.toLowerCase().includes(keyword)
            );
            
            if (!hasMedicalTerms) return text.replace(/\n/g, '<br>');
            
            // Formatação especial para protocolos médicos
            if (text.includes('Protocolo Recomendado:')) {
                return this.formatMedicalProtocol(text);
            }
            
            return text.replace(/\n/g, '<br>');
        }
        
        formatMedicalProtocol(text) {
            // Extrai e formata protocolos médicos
            const lines = text.split('\n');
            let formatted = '';
            
            lines.forEach(line => {
                if (line.includes('Protocolo Recomendado:')) {
                    formatted += `<div class="medical-protocol">
                        <h4><i class="fas fa-stethoscope"></i> ${line.replace('Protocolo Recomendado:', 'Protocolo Recomendado:')}</h4>`;
                } else if (line.includes('Modo:') || line.includes('PEEP:') || line.includes('FiO₂:') || line.includes('Frequência:')) {
                    if (!formatted.includes('<div class="protocol-params">')) {
                        formatted += '<div class="protocol-params">';
                    }
                    const [label, value] = line.split(':');
                    formatted += `
                        <div class="param">
                            <span class="param-label">${label.trim()}:</span>
                            <span class="param-value">${value.trim()}</span>
                        </div>
                    `;
                } else if (line.includes('Importante:')) {
                    formatted += '</div>';
                    formatted += `
                        <div class="message-alert info">
                            <i class="fas fa-info-circle"></i>
                            <p><strong>Importante:</strong> ${line.replace('Importante:', '').trim()}</p>
                        </div>
                    `;
                } else if (line.trim()) {
                    formatted += `<p>${line.trim()}</p>`;
                }
            });
            
            if (formatted.includes('<div class="protocol-params">') && !formatted.includes('</div>')) {
                formatted += '</div>';
            }
            
            return formatted;
        }
        
        showEnhancedTypingIndicator() {
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.style.display = 'flex';
            }
        }
        
        hideEnhancedTypingIndicator() {
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.style.display = 'none';
            }
        }
        
        scrollToBottom() {
            const messagesArea = document.getElementById('chatMessagesArea');
            if (messagesArea) {
                messagesArea.scrollTop = messagesArea.scrollHeight;
            }
        }
        
        toggleEnhancedVoiceInput() {
            this.state.fullscreenVoiceActive = !this.state.fullscreenVoiceActive;
            this.state.speechActive = this.state.fullscreenVoiceActive;
            
            if (this.state.fullscreenVoiceActive) {
                this.elements.voiceInputBtn.classList.add('listening');
                this.showNotification('Voz ativada', 'Fale agora...', 'info', 'fa-microphone');
                
                if (this.state.recognition && !this.state.isListening) {
                    this.state.recognition.start();
                }
            } else {
                this.elements.voiceInputBtn.classList.remove('listening');
                this.showNotification('Voz desativada', 'Reconhecimento de voz desativado.', 'info', 'fa-microphone-slash');
                
                if (!this.state.heyReelmiActive && this.state.recognition && this.state.isListening) {
                    this.state.recognition.stop();
                }
            }
            
            this.animateButton(this.elements.voiceInputBtn);
        }
        
        handleEnhancedFileUpload() {
            this.showNotification('Upload de arquivo', 'Selecione um arquivo médico para análise (PDF, DOC, ou imagem)', 'info', 'fa-file-medical');
            
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.pdf,.doc,.docx,.jpg,.jpeg,.png,.txt';
            fileInput.style.display = 'none';
            
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    this.showNotification(
                        'Arquivo carregado', 
                        `${file.name} (${(file.size / 1024).toFixed(0)} KB) pronto para análise.`,
                        'success',
                        'fa-check-circle'
                    );
                    
                    // Simula análise do arquivo
                    setTimeout(() => {
                        this.addEnhancedMessage('ai', `Analisei o arquivo "${file.name}". Encontrei referências sobre ventilação mecânica e protocolos neonatais. Posso extrair informações específicas se precisar.`);
                    }, 2000);
                }
            });
            
            document.body.appendChild(fileInput);
            fileInput.click();
            setTimeout(() => document.body.removeChild(fileInput), 100);
        }
        
        handleEnhancedImageUpload() {
            this.showNotification('Upload de imagem', 'Selecione uma imagem para análise (radiografia, gráficos, etc.)', 'info', 'fa-x-ray');
            
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.style.display = 'none';
            
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    this.showNotification(
                        'Imagem carregada', 
                        `Analisando ${file.name}...`,
                        'info',
                        'fa-spinner fa-spin'
                    );
                    
                    // Simula análise da imagem
                    setTimeout(() => {
                        this.addEnhancedMessage('ai', `Analisei a imagem "${file.name}". Detectei padrões respiratórios relevantes. Posso ajudar na interpretação dos dados visuais.`);
                    }, 3000);
                }
            });
            
            document.body.appendChild(fileInput);
            fileInput.click();
            setTimeout(() => document.body.removeChild(fileInput), 100);
        }
        
        showQuickQuestions() {
            const questions = [
                "Qual a diferença entre CPAP e PEEP?",
                "Como ajustar FiO2 para neonato pré-termo?",
                "Quais parâmetros para SDRA grave?",
                "Protocolo de desmame ventilatório",
                "Monitorização de paciente ventilado"
            ];
            
            let questionsHTML = questions.map(q => 
                `<div class="quick-question-item" data-question="${q}">${q}</div>`
            ).join('');
            
            const modal = document.createElement('div');
            modal.className = 'quick-questions-modal';
            modal.innerHTML = `
                <div class="quick-questions-content">
                    <h3><i class="fas fa-bolt"></i> Perguntas Rápidas</h3>
                    <p>Selecione uma pergunta para enviar:</p>
                    <div class="quick-questions-list">
                        ${questionsHTML}
                    </div>
                    <div class="modal-actions">
                        <button class="btn btn-secondary" id="closeQuestionsBtn">Fechar</button>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Event listeners
            document.querySelectorAll('.quick-question-item').forEach(item => {
                item.addEventListener('click', () => {
                    const question = item.dataset.question;
                    this.elements.chatInputContent.textContent = question;
                    modal.remove();
                    this.elements.chatInputContent.focus();
                });
            });
            
            document.getElementById('closeQuestionsBtn').addEventListener('click', () => {
                modal.remove();
            });
            
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }
        
        handleQuickAction(action) {
            const actions = {
                ventilacao: "Explique os modos de ventilação mecânica disponíveis",
                cpap: "Quais são as indicações para uso de CPAP em neonatologia?",
                peep: "Como ajustar o PEEP ideal para diferentes condições?",
                oxigenio: "Protocolos de oxigenoterapia para recém-nascidos"
            };
            
            if (actions[action]) {
                this.elements.chatInputContent.textContent = actions[action];
                this.sendEnhancedMessage();
            }
        }
        
        loadConversation(conversationId) {
            // Simula carregamento de conversa
            this.showNotification('Carregando conversa', `Abrindo ${conversationId}...`, 'info', 'fa-spinner fa-spin');
            
            setTimeout(() => {
                // Limpa mensagens atuais
                const messagesArea = document.getElementById('chatMessagesArea');
                messagesArea.innerHTML = '';
                
                // Adiciona mensagens da conversa selecionada
                this.addEnhancedMessage('ai', `Bem-vinda de volta à conversa sobre ${conversationId}! Continuamos nossa discussão sobre ventilação mecânica.`);
                
                this.showNotification('Conversa carregada', `Conversa sobre ${conversationId} aberta`, 'success', 'fa-check-circle');
            }, 1000);
        }
        
        copyMessage(messageContent) {
            const text = messageContent.querySelector('.message-text').textContent;
            navigator.clipboard.writeText(text).then(() => {
                this.showNotification('Copiado!', 'Mensagem copiada para a área de transferência', 'success', 'fa-copy');
            });
        }
        
        replyToMessage(messageContent) {
            const text = messageContent.querySelector('.message-text').textContent;
            this.elements.chatInputContent.textContent = `Respondendo a: "${text.substring(0, 50)}..."`;
            this.elements.chatInputContent.focus();
        }
        
        saveMessage(messageContent) {
            const text = messageContent.querySelector('.message-text').textContent;
            this.showNotification('Mensagem salva!', 'Adicionada aos seus favoritos', 'success', 'fa-star');
            
            // Adiciona efeito visual
            const starBtn = messageContent.querySelector('.fa-star');
            starBtn.style.color = '#ffd700';
            starBtn.classList.replace('far', 'fas');
        }
        
        editMessage(messageContent) {
            const textElement = messageContent.querySelector('.message-text');
            const originalText = textElement.textContent;
            
            const input = document.createElement('div');
            input.className = 'chat-input';
            input.contentEditable = true;
            input.textContent = originalText;
            
            textElement.replaceWith(input);
            input.focus();
            
            // Salvar ao pressionar Enter
            input.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    const newText = input.textContent;
                    
                    const newTextElement = document.createElement('div');
                    newTextElement.className = 'message-text';
                    newTextElement.textContent = newText + ' (editado)';
                    
                    input.replaceWith(newTextElement);
                }
            });
        }
        
        deleteMessage(messageContent) {
            if (confirm('Tem certeza que deseja excluir esta mensagem?')) {
                messageContent.closest('.chat-message').remove();
                this.showNotification('Mensagem excluída', 'A mensagem foi removida', 'info', 'fa-trash-alt');
            }
        }
        
        addReaction(button) {
            const reaction = button.textContent;
            button.style.transform = 'scale(1.3)';
            button.style.backgroundColor = 'rgba(67, 97, 238, 0.2)';
            
            setTimeout(() => {
                button.style.transform = '';
            }, 300);
            
            this.showNotification('Reação adicionada', `Você reagiu com ${reaction}`, 'info', 'fa-smile');
        }
        
        handleSuggestion(suggestion) {
            const suggestions = {
                'Ver mais sobre PEEP': 'Explique detalhadamente sobre PEEP (Positive End-Expiratory Pressure)',
                'Protocolos neonatais': 'Liste os protocolos neonatais mais importantes para UTI',
                'Calculadora ventilatoría': 'Preciso calcular parâmetros ventilatorios para um paciente'
            };
            
            if (suggestions[suggestion]) {
                this.elements.chatInputContent.textContent = suggestions[suggestion];
                this.sendEnhancedMessage();
            }
        }
        
        clearEnhancedChat() {
            if (confirm('Tem certeza que deseja iniciar um novo chat? O chat atual será limpo.')) {
                const messagesArea = document.getElementById('chatMessagesArea');
                messagesArea.innerHTML = '';
                
                // Adiciona mensagem de boas-vindas
                this.addEnhancedMessage('ai', 'Olá Luiza! 👋 Eu sou o Reelmi AI, seu especialista em ventilação mecânica e neonatologia. Como posso ajudá-la hoje?');
                
                this.showNotification('Novo chat', 'Chat iniciado com sucesso!', 'success', 'fa-plus-circle');
            }
        }
        
        exportChat() {
            this.showNotification('Exportar chat', 'Preparando exportação do chat...', 'info', 'fa-download');
            
            // Simula exportação
            setTimeout(() => {
                this.showNotification('Chat exportado', 'O chat foi exportado com sucesso em formato PDF', 'success', 'fa-file-pdf');
            }, 1500);
        }
        
        clearAllChats() {
            if (confirm('Tem certeza que deseja limpar TODAS as conversas? Esta ação não pode ser desfeita.')) {
                this.showNotification('Chats limpos', 'Todas as conversas foram removidas', 'info', 'fa-trash-alt');
                
                // Simula limpeza
                const conversations = document.querySelectorAll('.conversation');
                conversations.forEach(conv => {
                    if (!conv.classList.contains('active')) {
                        conv.style.opacity = '0.5';
                    }
                });
            }
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
                        this.state.currentVoice = portugueseVoices[0];
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
                this.elements.chatInputContent.textContent = transcript;
                this.speakResponse("Processando sua pergunta...");
                
                // Enviar mensagem após um breve delay
                setTimeout(() => {
                    this.sendEnhancedMessage();
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
                if (this.elements.voiceInputBtn) {
                    this.elements.voiceInputBtn.classList.add('listening');
                    this.elements.voiceInputBtn.innerHTML = '<i class="fas fa-microphone"></i>';
                    this.elements.voiceInputBtn.title = 'Parar escuta';
                }
            } else {
                if (this.elements.voiceBtn) {
                    this.elements.voiceBtn.classList.remove('listening');
                    this.elements.voiceBtn.innerHTML = '<i class="fas fa-headphones"></i>';
                    this.elements.voiceBtn.querySelector('.btn-tooltip').textContent = 'Ativar Voz';
                }
                if (this.elements.voiceInputBtn) {
                    this.elements.voiceInputBtn.classList.remove('listening');
                    this.elements.voiceInputBtn.innerHTML = '<i class="fas fa-microphone"></i>';
                    this.elements.voiceInputBtn.title = 'Entrada por voz';
                }
            }
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
            this.elements.sendBtn.addEventListener('click', () => this.sendMessage());
            this.elements.openAllPlatforms.addEventListener('click', () => this.showConfirmationModal());
            
            // Botões da sidebar
            this.elements.chatInteligenteBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.openFullscreenChat();
                this.animateButton(this.elements.chatInteligenteBtn);
            });
            
            this.elements.newChatBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.openFullscreenChat();
                this.clearEnhancedChat();
                this.showNotification('Novo Chat', 'Novo chat iniciado com sucesso!', 'success', 'fa-plus-circle');
                this.animateButton(this.elements.newChatBtn);
            });
            
            // Sidebar controls para Luíza
            if (this.elements.nightModeToggle) {
                this.elements.nightModeToggle.addEventListener('click', () => {
                    const toggleSwitch = this.elements.nightModeToggle.querySelector('.toggle-switch');
                    toggleSwitch.classList.toggle('active');
                    this.toggleTheme();
                    this.animateButton(this.elements.nightModeToggle);
                });
            }
            
            if (this.elements.notificationToggle) {
                this.elements.notificationToggle.addEventListener('click', () => {
                    const toggleSwitch = this.elements.notificationToggle.querySelector('.toggle-switch');
                    toggleSwitch.classList.toggle('active');
                    const badge = this.elements.notificationToggle.querySelector('.badge');
                    
                    if (toggleSwitch.classList.contains('active')) {
                        badge.textContent = '3';
                        this.showNotification('Notificações ativadas', 'Você receberá notificações de novas mensagens.', 'info', 'fa-bell');
                    } else {
                        badge.textContent = '0';
                        this.showNotification('Notificações desativadas', 'Você não receberá mais notificações.', 'warning', 'fa-bell-slash');
                    }
                    
                    this.animateButton(this.elements.notificationToggle);
                });
            }
            
            if (this.elements.privacyToggle) {
                this.elements.privacyToggle.addEventListener('click', () => {
                    this.showNotification('Privacidade', 'Abrindo configurações de privacidade...', 'info', 'fa-shield-alt');
                    this.animateButton(this.elements.privacyToggle);
                });
            }
            
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
            
            // Botão de fechar (dentro da sidebar)
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
                    charIndex--;
                } else {
                    this.elements.chatInput.placeholder = currentPhrase.substring(0, charIndex + 1);
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
                if (this.elements.chatInputContent) {
                    this.elements.chatInputContent.focus();
                }
            }, 100);
            
            this.showNotification('Chat Inteligente', 'Bem-vinda Luiza! Chat especializado em ventilação mecânica aberto.', 'success', 'fa-comment-medical');
        }
        
        closeFullscreenChat() {
            this.elements.chatFullscreen.classList.remove('active');
            
            setTimeout(() => {
                this.elements.mainContainer.style.display = 'block';
                document.body.style.overflow = '';
            }, 300);
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
        
        // Enviar mensagem do dashboard
        sendMessage() {
            const message = this.elements.chatInput.value.trim();
            if (message) {
                // Abre o chat fullscreen
                this.openFullscreenChat();
                
                // Adiciona a mensagem do usuário
                this.addEnhancedMessage('user', message);
                
                // Limpa o input do dashboard
                this.elements.chatInput.value = '';
                
                // Mostra indicador de digitação
                this.showEnhancedTypingIndicator();
                
                // Gera resposta após delay
                setTimeout(() => {
                    this.hideEnhancedTypingIndicator();
                    const resposta = this.gerarRespostaEspecializada(message);
                    this.addEnhancedMessage('ai', resposta);
                    this.scrollToBottom();
                    
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
                this.showNotification('Modo ativado', message, 'info');
                this.elements.chatInput.focus();
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
        
        // Gerar resposta especializada
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
