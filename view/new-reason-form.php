<form action="/reasons" method="post" class="row row-cols-lg-auto py-4">
    <div class="col-12">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
        <label for="reason_cash" class="form-label">Sabab Kirim uchun</label>
        <input type="text" id="reason_cash" class="form-control" name="reason_cash" aria-label="Reason input field" required>

    </div>

    <button type="submit" class="btn btn-primary">+</button>

</form>
<form action="/reasons-cash" method="post" class="row row-cols-lg-auto py-4">
    <div class="col-12">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
        <label for="reason" class="form-label">Sabab Chiqim uchun</label>
        <input type="text" id="reason" class="form-control" name="reason" aria-label="Reason input field" required>

        <input type="hidden" name="status" value="Inactive">

    </div>

    <button type="submit" class="btn btn-primary">+</button>

</form>
