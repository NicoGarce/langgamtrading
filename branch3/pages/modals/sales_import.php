<div>
    <div class="modal fade" id="salesImport" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelNew">Import Sales Record</h5>
                    <button type="button" id="headClose" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration-form" enctype="multipart/form-data">
                        <!-- Add the file input field for Excel file import -->
                        <div class="mb-3">
                            <label for="excelFile" class="form-label">Upload Excel File</label>
                            <input type="file" class="form-control" id="excel" name="excel">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="import" name="import" class="btn btn-primary" disabled>Import File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $sales->importSale(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        // Get references to the file input and import button
        var fileInput = $("#excel");
        var importButton = $("#import");

        // Add an event listener to the file input
        fileInput.change(function () {
            // Enable the import button if a file is selected, otherwise disable it
            importButton.prop("disabled", !fileInput.val());
        });

        // Add an event listener to the form to handle submission
        $("#registration-form").submit(function (event) {
            // Check if a file is chosen before submitting the form
            if (!fileInput.val()) {
                // Display an alert or perform any necessary actions
                alert("Please choose a file before submitting.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>