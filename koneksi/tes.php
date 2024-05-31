<?php
      include "konek.php";

      // Check the connection
      if (mysqli_connect_errno()) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $query = mysqli_query($conn , "SELECT * FROM konsultasi");

      // Loop through the data
      while ($data = mysqli_fetch_array($query)) {
      ?>
        <tr>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><?php echo $data['wa']; ?></td>
          <td><?php echo $data['subjek']; ?></td>
          <td><?php echo $data['pesan']; ?></td>
        </tr>
      <?php
      }

      // Close the connection
      mysqli_close($conn );
      ?>
