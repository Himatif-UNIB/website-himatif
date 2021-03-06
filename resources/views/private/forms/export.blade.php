<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Keterangan</th>
            @foreach ($fields as $item)
                <th>{{ $item->question }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php($n = 1)
        @foreach ($answers as $item)
            <tr>
                <td>{{ $n }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('l, d M Y H:i:s') }}</td>
                <td>
                    @if ($item->is_over_date)
                        Melewati batas waktu
                    @endif
                    @if ($item->is_over_answer)
                        Melewati batas jawaban
                    @endif
                </td>

                @foreach ($item->answers as $answer)
                    <td>
                        @if (isset($answer->media[0]))
                            {{ $answer->media[0]->file_name }}
                        @else
                            @if ($answer->answer == null)
                                -
                            @else
                                {{ $answer->answer }}
                            @endif
                        @endif
                    </td>
                @endforeach
            </tr>

            @php($n++)
        @endforeach
    </tbody>
</table>
