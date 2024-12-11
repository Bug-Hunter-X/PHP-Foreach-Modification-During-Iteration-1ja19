```php
function processData(array $data): array {
  $keysToRemove = [];
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = $this->processData($value); 
    } else if ($value === 'remove') {
      $keysToRemove[] = $key; 
    }
  }
  foreach ($keysToRemove as $key) {
    unset($data[$key]);
  }
  return $data;
}

$data = ['a' => 1, 'b' => ['c' => 2, 'd' => 'remove'], 'e' => 3];
$processedData = processData($data);
print_r($processedData); //Correct output
```