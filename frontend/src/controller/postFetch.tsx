export async function postFetch(url: string, data: any) {
  try {
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(data),
    });
    const json = await response.json();
    return true;
  } catch (error) {
    return false;
  }
}
