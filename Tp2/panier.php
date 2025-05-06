<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS Bootstrap (placer juste avant la balise </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal de confirmation Bootstrap -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body" id="modalMessage">
        <!-- Message personnalisé ici -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" id="confirmBtn">Retirer</button>
      </div>
    </div>
  </div>
</div>

<script>
  let confirmCallback = true;

  function showConfirmationModal(message, callback) {
    document.getElementById('modalMessage').textContent = message;
    confirmCallback = callback;
    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
    modal.show();
  }

  document.getElementById('confirmBtn').addEventListener('click', () => {
    if (typeof confirmCallback === 'function') {
      confirmCallback();
    }
    const modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
    modal.hide();
  });
</script>
