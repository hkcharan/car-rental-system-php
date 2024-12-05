<script>
  let userContainer = document.querySelector('.user_container');
  openUser = () => {
    userContainer.classList.toggle('open_user');
  }


function addDays(date, days) {
    const result = new Date(date);
    result.setDate(result.getDate() + days);
    return result.toISOString().split('T')[0];
}

const today = new Date().toISOString().split('T')[0];

document.getElementById("pickupdate").setAttribute('min', today);

document.getElementById("dropoffdate").setAttribute('min', addDays(today, 1));

document.getElementById("pickupdate").addEventListener('input', function() {
    const selectedDate = this.value;
    const minDropoffDate = addDays(selectedDate, 1);
    document.getElementById("dropoffdate").setAttribute('min', minDropoffDate);

    if (document.getElementById("dropoffdate").value < minDropoffDate) {
        document.getElementById("dropoffdate").value = minDropoffDate;
    }
});

document.getElementById("dropoffdate").addEventListener('input', function() {
    const selectedDate = this.value;
    const minDropoffDate = addDays(document.getElementById("pickupdate").value, 1);

    if (selectedDate < minDropoffDate) {
        this.value = minDropoffDate;
    }
});




</script>

<script>
  let mainimage = document.getElementById('image');

  change = () => {
    mainimage.src = "<?php echo $image; ?>";
  }

  change1 = () => {
    mainimage.src = "<?php echo $image1; ?>";
  }

  change2 = () => {
    mainimage.src = "<?php echo $image2; ?>";
  }

  change3 = () => {
    mainimage.src = "<?php echo $image3; ?>";
  }
</script>

