```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = $this->processData($value); // Recursive call
    } else if ($value === 'remove') {
      unset($data[$key]); // Removing element from array
    }
  }
  return $data;
}

$data = ['a' => 1, 'b' => ['c' => 2, 'd' => 'remove'], 'e' => 3];
$processedData = processData($data);
print_r($processedData); //Notice that foreach modifies the array while iterating over it.
```