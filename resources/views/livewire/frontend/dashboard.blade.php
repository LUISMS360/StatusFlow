<div>
<!-- MAIN AREA -->
    <h1>Centro de Mando</h1>

    <!-- KPI CARDS -->
    <div class="kpi-grid">

        <div class="kpi-card">
            <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
            <div>
                <small>Tiempo perdido hoy</small>
                <h2>45 min</h2>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div>
            <div>
                <small>Tareas completadas</small>
                <h2>12</h2>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-icon"><i class="bi bi-lightning-charge-fill"></i></div>
            <div>
                <small>Eficiencia del Equipo</small>
                <h2>87%</h2>
            </div>
        </div>

    </div>

    <h3 style="margin-bottom:20px;">Estado del Equipo en Vivo</h3>

    <!-- GRID DE USUARIOS (HTML estático de ejemplo) -->
    <div class="grid-users">

        <div class="card user-card border-ok">
            <div style="font-size:2rem; margin-bottom:10px; color:#64748b;">
                <i class="bi bi-person-circle"></i>
            </div>
            <h3>Usuario Ejemplo</h3>
            <span class="badge bg-green">OPERATIVO</span>
        </div>

        <div class="card user-card border-alert">
            <div style="font-size:2rem; margin-bottom:10px; color:#64748b;">
                <i class="bi bi-person-circle"></i>
            </div>
            <h3>Usuario Bloqueado</h3>

            <span class="badge bg-red parpadea">BLOQUEADO</span>

            <p style="color:#ef4444; font-weight:bold; margin-top:10px; background:#fff1f2; padding:5px; border-radius:5px;">
                "Sin acceso al sistema"
            </p>

            <button
                style="margin-top:10px; background:#1e293b; color:white; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">
                <i class="bi bi-chat-left-text-fill"></i> Chat
            </button>
        </div>

    </div>

    <!-- TABLA DE INCIDENTES -->
    <div class="card" style="margin-top:30px;">
        <h3>Últimos Incidentes Reportados</h3>

        <table style="width:100%; text-align:left; border-collapse:collapse; margin-top:15px;">
            <tr style="color:#64748b; border-bottom:1px solid #e2e8f0;">
                <th style="padding:10px;">Hora</th>
                <th>Usuario</th>
                <th>Problema</th>
                <th>Estado</th>
            </tr>

            <tr>
                <td style="padding:10px;">09:30 AM</td>
                <td>Ana</td>
                <td>Sin acceso a GitHub</td>
                <td><span class="badge bg-green">Resuelto</span></td>
            </tr>

            <tr>
                <td style="padding:10px;">11:15 AM</td>
                <td>Carlos</td>
                <td>Bug crítico en Login</td>
                <td><span class="badge bg-green">Resuelto</span></td>
            </tr>

        </table>
    </div>
</div>