<!-- Actions dropdown -->
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Actions
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ route('medications.edit', $medication) }}">Edit</a></li>
        <li><a class="dropdown-item" href="{{ route('medications.delete', $medication) }}">Delete</a></li>
    </ul>
</div>
