document.addEventListener('DOMContentLoaded', () => {
  let $draggedItem = false;
  const $draggables = document.querySelectorAll('.home .social .js-drag-item');

  for (const $dragItem of $draggables) {
    $dragItem.addEventListener('dragstart', (e) => {
      $draggedItem = e.target;
      $draggedItem.classList.remove('zoomIn');
      $draggedItem.classList.add('zoomOut');
      e.dataTransfer.effectAllowed = 'move';
    })
  }

  const $dragTargets = document.querySelectorAll('.js-drag-target');
  for (const $target of $dragTargets) {
    $target.addEventListener('dragover', (e) => {
      e.preventDefault();
    })
    $target.addEventListener('dragenter', (e) => {
      e.preventDefault();
      e.target.style.backgroundColor = '#44D62C';
    })
    $target.addEventListener('dragleave', (e) => {
      e.preventDefault();
      e.target.style.backgroundColor = '#ffffff';
    })
    $target.addEventListener('drop', (e) => {
      e.preventDefault();
      $draggedItem.classList.remove('zoomOut');
      $draggedItem.classList.add('zoomIn');
      e.target.appendChild($draggedItem);
      /*
      setTimeout(() => {
        window.location.href = $draggedItem.dataset.href;
      }, 1000);
      */
    })
  }
  document.body.addEventListener('dragover', (e) => {
    e.preventDefault();
  })
  document.body.addEventListener('dragenter', (e) => {
    e.preventDefault();
  })
  document.body.addEventListener('dragleave', (e) => {
    e.preventDefault();
  })
  document.body.addEventListener('drop', (e) => {
    e.preventDefault();
    $draggedItem.classList.remove('zoomOut');
    $draggedItem.classList.remove('zoomIn');
    $draggedItem.classList.add('zoomIn');
  })
});