@extends('admin.layouts.sidebar') @section('content')
<section>
    <div class="row">
        <div class="col-sm-12 text-left">
            <div class="card">
                <div class="card-body">
                    <table class="mb-5">
                        <tr>
                            <th width="150">Name Surname</th>
                            <th width="15">:</th>
                            <td>{{ $feedback->name_surname }}</td>
                        </tr>
                        <tr>
                            <th>E-Mail</th>
                            <th>:</th>
                            <td>{{ $feedback->email }}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <th>:</th>
                            <td>{{ $feedback->message }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <th>:</th>
                            <td>{{ $feedback->created_at }}</td>
                        </tr>
                    </table>
                    <a href="javascript:history.back();" class="btn btn-info"><i class="fa fa-arrow-left"></i> Go back</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
