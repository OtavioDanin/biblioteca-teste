<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção - Problemas Técnicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .error-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .error-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-bottom: 20px;
        }

        .btn-retry {
            margin-top: 20px;
        }

        .progress {
            height: 8px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-container">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h1 class="display-4">Ops! Estamos com problemas técnicos</h1>
            <p class="lead">Nossa equipe já está trabalhando para resolver o problema o mais rápido possível.</p>
            <p>Pedimos desculpas pelo inconveniente e agradecemos sua paciência.</p>

            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    style="width: 75%"></div>
            </div>
            <p class="text-muted mt-3">Tempo estimado para resolução: <span id="countdown">30 minutos</span></p>
        </div>
    </div>
</body>

</html>
