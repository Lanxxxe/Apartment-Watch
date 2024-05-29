<!-- Update Modal -->
<div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Payment Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./model/updatePayment.php" method="POST">
        <div class="modal-body">
            <input type="text" name="paymentid" hidden>
            <input type="text" name="tenantid" value="<?php echo $apartment['Tenant_ID'] ?>" hidden>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" name="paymentStatus" aria-label="Floating label select example">
                    <option selected>Choose</option>
                    <option value="Paid">Paid</option>
                    <option value="Not Paid">Not Paid</option>
                    <option value="Overdue">Overdue</option>
                </select>
                <label for="floatingSelect">Payment Status</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>