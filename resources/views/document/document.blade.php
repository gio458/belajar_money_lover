@extends('layouts.app')

@section('page_title_main', 'My ')
@section('page_title_blue', 'Document')
@section('page_description', 'Manage your exported history files.')

@section('content')

<div class="document-page">

    <div class="header-section">
        <h2>Your Exported Documents</h2>
    </div>

    <div class="table-container">
        <table class="doc-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($documents as $doc)
                    <tr>
                        <td>{{ $doc->name }}</td>
                        <td>{{ strtoupper($doc->type) }}</td>
                        <td>{{ $doc->created_at->format('d M Y') }}</td>
                        <td>{{ number_format($doc->size / 1024, 2) }} KB</td>

                        <td>
                            <a href="{{ route('document.download', $doc->id) }}"
                               class="btn-download">
                                Download
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
