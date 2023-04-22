<html>
<head>
    <title>Calculator</title>
</head>
<style>
    body{
        padding-left: 300px;
    }
</style>
<body>
    <h1 style="padding-left: 200px;">Calculator</h1>
    <div style="display:flex">
    <form method="POST" action="/tinh">
        @csrf
        <label for="firstNumber">Chiều cao:</label>
        <input type="number" name="firstNumber" id="firstNumber"><br><br>
        <label for="secondNumber">đáy:</label>
        <input type="number" name="secondNumber" id="secondNumber"><br><br>
        <button type="submit">tính</button>
    </form>

    @if(isset($result))
        <h2>Kết quả: {{ $result }}</h2>
    @endif

    <form method="POST" action="/tinh">
        @csrf
        <label for="firstNumber">Cạnh A</label>
        <input type="number" name="A" id="firstNumber"><br><br>
        <label for="secondNumber">Cạnh B</label>
        <input type="number" name="B" id="secondNumber"><br><br>
        <label for="firstNumber">Cạnh C</label>
        <input type="number" name="C" id="firstNumber"><br><br>
        <label for="firstNumber">Cạnh D</label>
        <input type="number" name="D" id="firstNumber"><br><br>
        <button type="submit">tính</button>

    </form>

    @if(isset($result1))
        <h2>Kết quả: {{ $result1 }}</h2>
    @endif
    </div>

</body>
</html>
