import requests
from xml.etree import ElementTree as ET


def list_directory(url):
    response = requests.request('PROPFIND', url)
    if response.status_code == 207:  # Successful multi-status response
        xml_data = response.content
        namespaces = {'d': 'DAV:'}  # Namespace for DAV properties

        # Parse the XML response and extract directory listing information
        root = ET.fromstring(xml_data)
        resources = root.findall('.//d:response', namespaces)

        print('Directory listing for:', url)
        print("{:<30s} {:<10s} {:<20s}".format(
            'Name', 'Size', 'Last Modified'))

        for resource in resources:
            href = resource.find('.//d:href', namespaces).text
            display_name = resource.find('.//d:displayname', namespaces).text
            content_type = resource.find(
                './/d:getcontenttype', namespaces).text
            content_length = resource.find(
                './/d:getcontentlength', namespaces).text
            last_modified = resource.find(
                './/d:getlastmodified', namespaces).text

            # Ignore the root directory entry
            if href == '/':
                continue

            # Check if it's a collection (directory) or a file
            if content_type == 'httpd/unix-directory':
                size = 'Directory'
            else:
                size = content_length

            print("{:<30s} {:<10s} {:<20s}".format(
                display_name, size, last_modified))

    else:
        print('Failed to retrieve directory listing for:', url)


def change_directory(url, directory):
    new_url = url + directory
    return new_url


def upload_file(url, file_path):
    file_name = os.path.basename(file_path)
    destination_url = url + file_name

    with open(file_path, 'rb') as file:
        response = requests.put(destination_url, data=file)

    if response.status_code == 201:
        print(f'Successfully uploaded {file_name} to {url}')
    else:
        print(f'Failed to upload {file_name} to {url}')


def download_file(url, file_path):
    file_name = os.path.basename(file_path)
    source_url = url + file_name

    response = requests.get(source_url)

    if response.status_code == 200:
        with open(file_path, 'wb') as file:
            file.write(response.content)
        print(f'Successfully downloaded {file_name} from {url}')
    else:
        print(f'Failed to download {file_name} from {url}')


def main_menu():
    print("Welcome to the WebDAV Command Line Tool!\n")

    while True:
        print("Menu Options:")
        print("1. List Directory")
        print("2. Change Directory")
        print("3. Upload File")
        print("4. Download File")
        print("5. Exit")

        choice = input("Enter your choice: ")

        if choice == '1':
            url = input("Enter the URL: ")
            list_directory(url)
        elif choice == '2':
            url = input("Enter the URL: ")
            directory = input("Enter the directory name: ")
            url = change_directory(url, directory)
            list_directory(url)
        elif choice == '3':
            url = input("Enter the URL: ")
            file_path = input("Enter the file path: ")
            upload_file(url, file_path)
        elif choice == '4':
            url = input("Enter the URL: ")
            file_path = input("Enter the file path: ")
            download_file(url, file_path)
        elif choice == '5':
            break
        else:
            print("Invalid choice. Please try again.\n")


# Execute the main_menu() function when the module is imported
main_menu()
