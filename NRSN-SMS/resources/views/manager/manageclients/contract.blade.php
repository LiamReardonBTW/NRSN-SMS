<x-app-layout>

    <div class="container">
        <h2>Client Contracts</h2>

        @if (count($client->clientContracts) === 0)
            <p>No contracts available for this client.</p>
        @else
            <ul>
                @foreach ($client->clientContracts as $contract)
                    <li>Contract ID: {{ $contract->id }}</li>
                    <!-- Display other contract details here -->
                @endforeach
            </ul>
        @endif
    </div>

</x-app-layout>
