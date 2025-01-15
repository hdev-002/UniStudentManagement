<div style="font-family: Arial, sans-serif; text-align: center;">
    <h2>Student Details</h2>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Age:</strong> {{ $student->age }}</p>
</div>

<button wire:click="print">Print Student Details</button>

{{--@script--}}
<script>
    $wire.on('printDocument', (event) => {
        const printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <title>Print</title>
                    <style>
                        body { font-family: Arial, sans-serif; }
                    </style>
                </head>
                <body>${event.detail.htmlContent}</body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    });
</script>
{{--@endscript--}}
