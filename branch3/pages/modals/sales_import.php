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
                            <button type="submit" id="import" name="import" class="btn btn-primary">Import File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $sales->importSale(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>