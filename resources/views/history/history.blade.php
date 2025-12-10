@extends('layouts.app')

@section('page_title_blue', 'History')
@section('page_description', 'View and manage your transactions.')

@section('content')

<div class="history-page">

    <!-- Filter + Search -->
    <form method="GET">
        <div class="filter-section">

            <select name="filter" class="filter-select" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="income" {{ $filter=='income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $filter=='expense' ? 'selected' : '' }}>Expenses</option>
            </select>

            <input type="text" 
                name="search" 
                value="{{ $search }}" 
                class="search-input" 
                placeholder="Search...">
        </div>
    </form>

    <!-- Table -->
    <div class="table-container">
        <table class="history-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($history as $item)
                <tr id="row-{{ $item->id }}"
                    data-id="{{ $item->id }}"
                    data-type="{{ $item->type }}"
                    data-category="{{ $item->category }}"
                    data-amount="{{ $item->amount }}"
                    data-note="{{ $item->note }}"
                    data-date="{{ $item->date }}"
                    data-name="{{ $item->category }}">

                    <td>{{ date('d/m/y', strtotime($item->date)) }}</td>

                    <td>
                        <span class="badge {{ $item->type }}">
                            {{ ucfirst($item->type) }}
                        </span>
                    </td>

                    <td>{{ $item->category }}</td>
                    <td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                    <td>{{ $item->note }}</td>


                    <td class="action-btns">
                        <button onclick="openEditModal(this)" class="btn-edit">Edit</button>

                        <!-- delete btn untuk SweetAlert -->
                        <button class="btn-delete" 
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->category }}">
                            Delete
                        </button>
                        <form method="GET" action="{{ route('document.export') }}">
                            <input type="hidden" name="from" value="{{ $item->date }}">
                            <input type="hidden" name="to" value="{{ $item->date }}">
                            <input type="hidden" name="format" value="excel">
                            <button type="submit" class="btn btn-download">Download</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div style="margin-top:20px;">
        {{ $history->links('pagination::bootstrap-5') }}
    </div>
</div>
<form id="deleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>


<!-- EDIT MODAL -->
<div class="modal-bg" id="editModal">
    <div class="modal-box">
        <h3>Edit Transaction</h3>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <label>Type</label>
            <select name="type" id="editType">
                <option value="income">Income</option>
                <option value="expense">Expenses</option>
            </select>

            <label>Category</label>
            <input type="text" name="category" id="editCategory">

            <label>Amount</label>
            <input type="number" name="amount" id="editAmount">

            <label>Note</label>
            <input type="text" name="note" id="editNote">

            <label>Date</label>
            <input type="date" name="date" id="editDate">

            <div class="modal-footer">
                <button class="btn-save">Save Changes</button>
                <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>

// ======================
// EDIT MODAL
// ======================
function openEditModal(btn) {
    let row = btn.closest("tr");

    let id = row.dataset.id;
    document.getElementById("editForm").action = "/history/" + id;

    document.getElementById("editType").value = row.dataset.type;
    document.getElementById("editCategory").value = row.dataset.category;
    document.getElementById("editAmount").value = row.dataset.amount;
    document.getElementById("editNote").value = row.dataset.note;
    document.getElementById("editDate").value = row.dataset.date;

    document.getElementById("editModal").style.display = "flex";
}

function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}


// ======================
// SWEETALERT DELETE (SAFARI FRIENDLY)
// ======================
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", function () {

            let id = this.dataset.id;

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    // Kirim DELETE ke server
                    fetch(`/history/${id}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        }
                    })
                    .then(async (res) => {
                        try {
                            return await res.json();
                        } catch (e) {
                            return {};
                        }
                    })
                    .then(data => {

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your data has been deleted.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            location.reload(); // refresh halaman
                        }, 1500);
                    });

                }
            });
        });
    });

});
document.querySelector('.search-input').addEventListener('keydown', function(e){
    if(e.key === 'Enter'){
        this.form.submit();
    }
}); 

</script>

@endsection
