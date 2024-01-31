@foreach ($Tasks as $Task)
    <tr>
        <td>{{ $Task->name }}</td>
        <td>{{ $Task->project->name }}</td>
        <td>{{ $Task->description }}</td>
        <td class="d-flex">
            <a href="{{ route('tâches.show', ['tâch' => $Task]) }}" class="btn btn-sm btn-default">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('tâches.edit', ['tâch' => $Task]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('tâches.destroy', ['tâch' => $Task]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <div class=" pagination m-0 float-right">
            {{ $Tasks->links() }}
        </div>
    </td>
</tr>
