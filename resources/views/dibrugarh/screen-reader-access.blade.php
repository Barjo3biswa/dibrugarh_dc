@extends('dibrugarh.layout.master')
@section('content')

<section class="screen-reader-section">
    <div class="screen-reader-container">
        <h4>Screen Reader</h4>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Screen Reader</th>
                <th scope="col">Website</th>
                <th scope="col">Free/ Paid</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Non Visual Desktop Access (NVDA)</th>
                    <td><p><a href="http://www.nvda-project.org" target="_blank">http://www.nvda-project.org/ (External website that opens in a new window)</a></p></td>
                    <td>Free</td>
                    </tr>
                    <tr>
                    <th scope="row">System Access To Go</th>
                    <td><p><a href="http://www.satogo.com/" target="_blank">http://www.satogo.com/ (External website that opens in a new window)</a></p></td>
                    <td>Free</td>
                    </tr>
                    <tr>
                    <tr>
                    <th scope="row">WebAnywhere</th>
                    <td><p><a href="http://webanywhere.cs.washington.edu/wa.php" target="_blank">http://webanywhere.cs.washington.edu/wa.php (External website that opens in a new window)</a></p></td>
                    <td>Free</td>
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
@section('scripts')


@endsection