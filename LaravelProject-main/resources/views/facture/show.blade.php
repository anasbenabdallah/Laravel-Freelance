@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header">Facture Details</div>
        <div class="card-body">
            <h5 class="card-title">Client: {{ $facture->client }}</h5>
            <p class="card-text">Caissier: {{ $facture->caissier }}</p>
            <p class="card-text">Montant: {{ $facture->Montant }}</p>
            <p class="card-text">Etat: {{ $facture->Etat }}</p>
            <p class="card-text">Date: {{ $facture->date }}</p>
            
            <!-- Print button -->
            <button onclick="printFacture()" class="btn btn-primary">Print Facture</button>

            <script>
                function printFacture() {
                    window.print();
                }
            </script>
        </div>
    </div>
</div>
@endsection
