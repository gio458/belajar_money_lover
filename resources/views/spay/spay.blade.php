@extends('layouts.app')

@section('page_title_main', 'S -')
@section('page_title_blue', 'Pay')
@section('page_description', 'Record your income and expenses easily.')

@section('content')

@section('content')
<div class="spay-container">

    <div id="notify" class="notify-box">Mode: Income</div>

    <div class="btn-switch">
        <button class="btn-income active">Income</button>
        <button class="btn-expense active">Expenses</button>
    </div>

    <form action="{{ route('spay.store') }}" method="POST">
        @csrf

        <input type="hidden" name="type" id="typeInput" value="income">

        <label>Amount</label>
        <input type="number" name="amount" required>

        <label>Category</label>
        <input type="text" name="category" required>

        <label>Note</label>
        <input type="text" name="note">

        <label>Date</label>
        <input type="date" name="date" required>

        <button type="submit" class="btn-save">Save</button>
    </form>

    <script>
let notif = document.getElementById("notify");
let incomeBtn = document.querySelector(".btn-income");
let expenseBtn = document.querySelector(".btn-expense");
let typeInput = document.getElementById("typeInput");

function showNotif(text) {
    notif.textContent = text;
    notif.classList.add("show");

    setTimeout(() => {
        notif.classList.remove("show");
    }, 1400);
}

incomeBtn.onclick = function() {
    typeInput.value = "income";
    incomeBtn.classList.add("active");
    expenseBtn.classList.remove("active");

    showNotif("Mode Income dipilih");
};

expenseBtn.onclick = function() {
    typeInput.value = "expense";
    expenseBtn.classList.add("active");
    incomeBtn.classList.remove("active");

    showNotif("Mode Expenses dipilih");
};
</script>

</div>
@endsection

</form>


</div>
@endsection
