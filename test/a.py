from docx import Document

# Function to convert document to HTML
def docx_to_html(doc_path, output_path):
    try:
        # Load the Word document
        doc = Document(doc_path)
        
        # Start the HTML content
        html_content = '''
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document to HTML Conversion</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .container {
                    width: 80%;
                    margin: 0 auto;
                    background: #fff;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1, h2, h3 {
                    color: #333;
                }
                p {
                    margin-bottom: 10px;
                }
                ul {
                    margin-left: 20px;
                }
                em {
                    font-style: italic;
                }
                strong {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class="container">
        '''
        
        # Iterate through paragraphs in the document
        for para in doc.paragraphs:
            if para.style.name.startswith('Heading 1'):
                html_content += f'<h1>{para.text}</h1>'
            elif para.style.name.startswith('Heading 2'):
                html_content += f'<h2>{para.text}</h2>'
            elif para.style.name.startswith('Heading 3'):
                html_content += f'<h3>{para.text}</h3>'
            else:
                # Check for text with formatting
                run_text = ''
                for run in para.runs:
                    run_text += run.text
                    if run.italic:
                        run_text = f'<em>{run_text}</em>'
                    if run.bold:
                        run_text = f'<strong>{run_text}</strong>'
                
                html_content += f'<p>{run_text}</p>'
        
        # Close the HTML tags
        html_content += '''
            </div>
        </body>
        </html>
        '''
        
        # Write the HTML content to a file with UTF-8 encoding
        with open(output_path, 'w', encoding='utf-8') as file:
            file.write(html_content)
            
        print(f"Conversion successful! HTML file saved as {output_path}")
    
    except Exception as e:
        print(f"Error occurred during conversion: {str(e)}")

# Specify the path to your Word document and the output HTML file
doc_path = 'PRIVACY POLICY SPACEKRAFT.docx'
output_path = 'tprivacy_pollicy.html'

# Convert the document to HTML
docx_to_html(doc_path, output_path)
